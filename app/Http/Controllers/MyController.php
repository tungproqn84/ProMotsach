<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Category;
use App\Order;
use App\Product;
use App\Saleproduct;
use App\Slide;
use Illuminate\Http\Request;
use App\Portfolio;
use Cart;
class MyController extends Controller
{


// CONTROLLER ADMIN

    // gọi trang chủ
    public function getHomePage() {
        return view('admin/home');
    }
    // gọi trang danh mục
    public function getPortfolioPage() {
        $portfolios = Portfolio::all();
        return view('admin/portfolio', compact('portfolios'));
    }
<<<<<<< HEAD

=======
    // Thêm danh mục
>>>>>>> 4c41a29ab2b6da00e2b06c486296756e22e536ec
    public function AddPortfolio() {
        return view('admin/addPortfolio');
    }
    // Hiển thị thông tin danh mục
    public function ShowPortfolio($id) {
        $portfolio = Portfolio::where('PortfolioID', $id)->first();
        return view('admin/showPortfolio', compact('portfolio'));
    }

// CONTROLLER CUSTOMER
    public function getindex()
    {
        $product=Product::where('PSale', 0)->limit(3)->get();
        $cat=Category::all();
        $slide=Slide::all();
        $sale= Product::where('PSale', '<>' ,0)->limit(3)->get();
        $hot=Product::orderby('PBuy', 'desc')->limit(3)->get();
        return view('customer/index', compact('product', 'cat', 'slide', 'sale', 'hot'));
<<<<<<< HEAD
=======
    }
    public function getcart()
    {

>>>>>>> 4c41a29ab2b6da00e2b06c486296756e22e536ec
    }
    public function detailproduct($id)
    {
        $cat=Category::all();
        $slide=Slide::all();
        $product=Product::where('PID', $id)->first();
        return view('customer/detailproduct', compact('product', 'cat', 'slide'));
    }
    public function getsee($id)
    {
        if($id==1)
        {
            $product=Product::where('PSale', '<>', 0)->paginate(6);
        }
        elseif($id==2)
        {
            $product=Product::orderby('PBuy', 'desc')->paginate(6);
        }
        else
            $product=Product::paginate(6);
        $cat=Category::all();
        $slide=Slide::all();
<<<<<<< HEAD
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'id'));
=======
        return view('customer/xemthempro', compact('product', 'cat', 'slide'));
>>>>>>> 4c41a29ab2b6da00e2b06c486296756e22e536ec
    }
    //cart
    public function getcart()
    {
        return view('customer/cart');
    }
    public function addcart($id)
    {
        $product = Product::where('PID', $id)-> first();
        // print_r($product->PName); die();
        if($product->PSale==0)
            $price=$product->PPrice;
        else
            $price=$product->PPrice - $product->PPrice*$product->PSale;
        Cart::add(array('id' => $id, 'name' => $product->PName, 'qty' => 1, 'price' => $price,'weight' =>0));
        $cart = Cart::content();
        return view('customer/cart', array('cart' => $cart,'product'=>$product));
    }
    public function getdelete($id)
    {
    $cart= Cart::content();
        $rowId= Cart::search(function ($cartItem, $rowId) use($cart,$id) {
            return $cartItem->id==$id;
        })->first();
        Cart::remove($rowId);
        return view('customer/cart');
    }
    public function deletecart()
    {
        Cart::destroy();
        return redirect(Route('home'));
    }
    //update giỏ hàng
    public function updatecart(Request $rq)
    {
        $cart=Cart::content();
        $id=$rq->id;
        $rowId = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
         })->first();
         printf($rowId);die();
        Cart::update($rowId[0], $rq->id);
        printf($rq->id); die();
    }
    //mua sản phẩm
    public function buy(){
        $cart=Cart::content();
        $total=Cart::subtotal();
        $hd= new Bill();
        $hd->CusID=Session::get('id');
        $hd->BillDate= now();
        $hd->Total=$total;
        $hd->save();
        foreach($cart as $sp){
            $idhd=bills::max('ID');
            $detail= new Order();
            $detail->OrderID=$idhd;
            $detail->PID=$sp->id;
            $detail->Amount=$sp->qty;
            $detail->save();
            $product=product::find($detail->PID);
            $product->soluong=$product->PAmount - $detail->Amount;
            $product->save();
            }
            // //gửi mail
            // $user = User::find(Session::get('id'));
            // $email = new UserRegistered($user);
            // Mail::to($user->email)->send($email);
        Cart::destroy();
        return redirect(Route('home'));
    }

}
