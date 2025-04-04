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

    public function getIndex()
    {
        $slides = Slide::all();
        $new_products = Product::whereIn('new', [1, 0])->get();
        $top_products = Product::whereIn('top', [1, 0])->get();

        // Kiểm tra nếu user đã đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
            $masterLayout = ($user->level == 1) ? 'admin.master' : 'page.master';
        } else {
            $masterLayout = 'page.master'; // Mặc định là khách chưa đăng nhập
        }

        return view('page.index', compact('slides', 'new_products', 'top_products', 'masterLayout'));
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

    public function postCheckout(Request $request){
    
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
        ['email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            'repassword'=>'required|same:password'
        ],
        ['email.required'=>'Vui lòng nhập email',
        'email.email'=>'Không đúng định dạng email',
        'email.unique'=>'Email đã có người sử  dụng',
        'password.required'=>'Vui lòng nhập mật khẩu',
        'repassword.same'=>'Mật khẩu không giống nhau',
        'password.min'=>'Mật khẩu ít nhất 6 ký tự'
        ]);

        $user=new User();
        $user->full_name=$req->fullname;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->level=3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
        $user->save();
        return redirect()->back()->with('success','Tạo tài khoản thành công');
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
}


