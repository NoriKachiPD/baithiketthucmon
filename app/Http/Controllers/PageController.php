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

class PageController extends Controller
{
    public function getIndex(){
        $slides= Slide::all();  //trả về kiểu dữ liệu Collection, Illuminate\Database\Eloquent\Collection

        //lấy về sản phẩm mới hiển thị ra trang chủ
        $new_products = Product::whereIn('new', [1, 0])->get(); // lấy tất cả sản phẩm mới
        // $new_products = Product::where('new', operator: 0)->get(); // lấy tất cả sản phẩm mới


        //lấy về sản phẩm đề nghị hiển thị ra trang chủ
        $top_products = Product::whereIn('top', [1, 0])->get();   //trả về kiểu dữ liệu Collection, Illuminate\Database\Eloquent\Collection
        // $top_products = Product::where('top', 0)->get();   //trả về kiểu dữ liệu Collection, Illuminate\Database\Eloquent\Collection

        //lấy về sản phẩm khuyến mãi hiển thị ra trang chủ
        // $promotion_products= Product::where('promotion_price','<>',0)->paginate(4);
    //    ,'promotion_products'
        return view('page.index',compact('slides','new_products','top_products'));



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
}
