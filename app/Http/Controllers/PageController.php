<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;

use App\Mail\PasswordMail;

use App\Mail\OrderDeliveredMail;
use App\Mail\OrderCancelledMail;

use App\Mail\OrderConfirmationMail;  // Import class đúng


class PageController extends Controller
{

    // public function getIndex(){
    //     $slides= Slide::all();  //trả về kiểu dữ liệu Collection, Illuminate\Database\Eloquent\Collection

    //     //lấy về sản phẩm mới hiển thị ra trang chủ
    //     $new_products = Product::whereIn('new', [1, 0])->get(); // lấy tất cả sản phẩm mới
    //     // $new_products = Product::where('new', operator: 0)->get(); // lấy tất cả sản phẩm mới


    //     //lấy về sản phẩm đề nghị hiển thị ra trang chủ
    //     $top_products = Product::whereIn('top', [1, 0])->get();   //trả về kiểu dữ liệu Collection, Illuminate\Database\Eloquent\Collection
    //     // $top_products = Product::where('top', 0)->get();   //trả về kiểu dữ liệu Collection, Illuminate\Database\Eloquent\Collection

    //     //lấy về sản phẩm khuyến mãi hiển thị ra trang chủ
    //     // $promotion_products= Product::where('promotion_price','<>',0)->paginate(4);
    // //    ,'promotion_products'
    //     return view('page.index',compact('slides','new_products','top_products'));



    // }

    // public function getIndex()
    // {
    //     $slides = Slide::all();
    //     $new_products = Product::whereIn('new', [1, 0])->get();
    //     $top_products = Product::whereIn('top', [1, 0])->get();

    //     // Kiểm tra nếu user đã đăng nhập
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         $masterLayout = ($user->level == 1) ? 'admin.master' : 'page.master';
    //     } else {
    //         $masterLayout = 'page.master'; // Mặc định là khách chưa đăng nhập
    //     }

    //     return view('page.index', compact('slides', 'new_products', 'top_products', 'masterLayout'));
    // }

    public function getIndex(Request $request)
    {
        $filter = $request->input('filter', 'all');
        $keyword = $request->input('keyword');
    
        $slides = Slide::all();
    
        // Base query
        $query = Product::query();
    
        // Nếu có từ khóa tìm kiếm
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        } else {
            if ($filter == 'discount') {
                $query->where('promotion_price', '>', 0);
            } elseif ($filter == 'no_discount') {
                $query->where('promotion_price', 0);
            }
        }
    
        $new_products = $query->get();
        $top_products = Product::whereIn('top', [1, 0])->get();
    
        if (Auth::check()) {
            $user = Auth::user();
            $masterLayout = ($user->level == 1) ? 'admin.master' : 'page.master';
        } else {
            $masterLayout = 'page.master';
        }
    
        return view('page.index', compact('slides', 'new_products', 'top_products', 'masterLayout', 'filter', 'keyword'));
    }
    
    
    public function getChiTiet($sanpham_id){
        $sanpham=Product::find($sanpham_id);
        return view('page.chitiet',compact('sanpham'));
    }

    public function addToCart(Request $request,$id){
        $product=Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
     }

     public function delCartItem($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else Session::forget('cart');
        return redirect()->back();
    }

    public function tangSoLuong(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    
    public function giamSoLuong(Request $request, $id) {
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
    
        if (count($cart->items) > 0) {
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }
    
        return redirect()->back();
    }
    

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            // Nếu không có giỏ hàng, trả về view với giỏ hàng trống
            return view('page.checkout', [
                'productCarts' => [],
                'cart' => null,
                'totalPrice' => 0
            ]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('page.checkout', [
            'productCarts' => $cart->items,
            'cart' => $cart, // Thêm dòng này để truyền biến $cart sang view
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function postCheckout(Request $request)
    {
        $cart=Session::get('cart');
        $customer=new Customer();
        $customer->name=$request->input('name');
        $customer->gender=$request->input('gender');
        $customer->email=$request->input('email');
        $customer->address=$request->input('address');
        $customer->phone_number=$request->input('phone_number');
        $customer->note=$request->input('notes');
        $customer->save();

        $bill=new Bill();
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$request->input('payment_method');
        $bill->note=$request->input('notes');
        $bill->save();

        foreach($cart->items as $key=>$value)
        {
            $bill_detail=new BillDetail();
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('success','Đặt hàng thành công');

    }

    public function getSignin(){
       
        return view('page.dangky');
    }

    public function postSignin(Request $req){
        $validated = $req->validate(
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'fullname' => 'required',
                'repassword' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử  dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'repassword.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]
        );
    
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->level = 3; // 1: admin, 2: kỹ thuật, 3: khách hàng
        $user->image = 'user.png'; // Gán tên ảnh mặc định
        $user->save();
    
        return redirect()->back()->with('success', 'Tạo tài khoản thành công');
    }    

    public function getLogin(){
        return view('page.login');
    }

public function postLogin(Request $req){
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]
        );
        $credentials=['email'=>$req->email,'password'=>$req->password];
        if(Auth::attempt($credentials)){ 
            // Kiểm tra nếu user có level = 1
            if (Auth::user()->level == 1) {
                return redirect()->route('banhang.index')->with(['flag' => 'alert', 'message' => 'Đăng nhập thành công']);
            }
             else {
                return redirect('/trangchu')->with(['flag' => 'warning', 'message' => 'Đăng nhập thành công']);
            }
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Sai tài khoản hoặc mật khẩu']);
        }
        // if(Auth::attempt($credentials)){//The attempt method will return true if authentication was successful. Otherwise, false will be returned.
        //     return redirect('/trangchu')->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
        // }
        // else{
        //     return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        // }
    }

    public function getResetPassword()
    {
        return view('page.quenmatkhau');
    }
    
    public function postResetPassword(Request $req)
    {
        $req->validate([
            'email' => 'required|email'
        ]);
    
        $user = User::where('email', $req->email)->first();
    
        if (!$user) {
            return redirect()->back()->with('message', 'Email không tồn tại trong hệ thống.');
        }
    
        $newPass = Str::random(8);
        $user->password = Hash::make($newPass);
        $user->save();
    
        Mail::to($req->email)->send(new PasswordMail($req->email, $newPass));
    
        return redirect()->route('getlogin')->with('flag', 'alert')->with('message', 'Mật khẩu mới đã được gửi đến email của bạn.');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.getLogin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/trangchu');  // Chuyển hướng về trang chủ sau khi logout
    }


    // Hiển thị trang chỉnh sửa thông tin cá nhân
    public function getProfile()
    {
        if (!Auth::check()) {
            return redirect()->route('getLogin')->with('warning', 'Vui lòng đăng nhập');
        }

        $user = Auth::user();
        return view('page.profile', compact('user'));
    }

    // Xử lý cập nhật thông tin cá nhân
    public function postProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,JPG,JPEG,PNG|max:10240',
        ]);
    
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->image = $request->input('image');
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
    
            // Xoá ảnh cũ nếu có
            if ($user->image && file_exists(public_path('images/' . $user->image))) {
                unlink(public_path('images/' . $user->image));
            }
    
            $user->image = $filename;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }
    
    public function orderList()
    {
        $orders = Order::all(); // hoặc select cụ thể: Order::select('order_code', 'name', ..., 'quantity', ...)->get();
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.order-list', compact('orders'));
    }
    
    public function updateOrderStatus(Request $request, $code)
    {
        $order = Order::where('order_code', $code)->firstOrFail(); // ✅ Trả về 1 Order đơn lẻ
    
        $order->status = $request->status;
        $order->save();
    
        if ($order->status === 'Giao hàng thành công') {
            Mail::to($order->email)->send(new OrderDeliveredMail($order));
        } elseif ($order->status === 'Đơn hàng bị hủy') {
            Mail::to($order->email)->send(new OrderCancelledMail($order));
        }
    
        return redirect()->route('admin.order.orderlist')->with('success', 'Cập nhật trạng thái thành công và đã thông báo qua email!');
    }    
    

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('success', 'Xóa đơn hàng thành công!');
    }
    public function trackOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tra cứu đơn hàng.');
        }

        $email = Auth::user()->email;
        $search = $request->input('search');

        $orders = Order::query()
            ->where('email', $email)
            ->when($search, function ($query, $search) {
                return $query->where('order_code', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Đảm bảo luôn truyền biến $orders và $search xuống view
        return view('orders.track', [
            'orders' => $orders ?? collect(), // ← fallback nếu cần
            'search' => $search
        ]);
    }

    private function generateOrderCode()
    {
        do {
            // Tạo mã với 3 chữ cái ngẫu nhiên + 4 số ngẫu nhiên, ví dụ: ABC1234
            $code = strtoupper(Str::random(3)) . rand(1000, 9999);
        } while (Order::where('order_code', $code)->exists()); // kiểm tra trùng
    
        return $code;
    }

    public function getDatHang()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if ($oldCart) {
            $cart = new \App\Models\Cart($oldCart); // ✅ đúng namespace
        } else {
            $cart = null;
        }

        return view('banhang.dathang', ['cart' => $cart]);
    }

    public function postDatHang(Request $request)
    {
        $cart = Session::get('cart'); // Lấy giỏ hàng từ session
    
        $totalQuantity = 0;
        if ($cart && $cart->items) {
            foreach ($cart->items as $product) {
                $totalQuantity += $product['qty'];
            }
        }
    
        $order = new Order();
        $order->order_code = $this->generateOrderCode(); // ✅ Dùng code tự động, không hardcode nữa
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->gender = $request->gender;
        $order->total_price = $request->total_price;
        $order->notes = $request->notes;
        $order->payment_method = $request->payment_method;
        $order->product_quantity = $totalQuantity;
        $order->save();
    
        Mail::to($order->email)->send(new OrderConfirmationMail($order));

        Session::forget('cart');
    
        return redirect()->route('banhang.getdathang')->with('success', 'Đặt hàng thành công!');
    }    
}