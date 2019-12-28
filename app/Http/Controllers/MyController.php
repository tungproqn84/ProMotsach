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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    // Thêm danh mục
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
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'id'));
        return view('customer/xemthempro', compact('product', 'cat', 'slide'));
    }
    //cart
    public function getcart()
    {
        $cat=Category::all();
        $cart=Cart::content();
        $pro=Product::all();
        return view('customer/cart', compact('cart', 'pro', 'cat'));
    }
    public function addcart($id)
    {
        $product = Product::where('PID', $id)-> first();
        if($product->PSale==0)
            $price=$product->PPrice;
        else
            $price=$product->PPrice - $product->PPrice*$product->PSale;
        $image=$product->PImage;
                //   print_r($product); die();
        Cart::add(array('id' => $id, 'name' => $product->PName, 'qty' => 1, 'price' => $price,'image'=>$image, 'weight'=>0));
        $cart = Cart::content();
        $pro=Product::all();
        return view('customer/cart', array('cart' => $cart,'product'=>$product),compact('pro'));
    }
    public function deletecart()
    {
        Cart::destroy();
        return redirect(Route('home'));
    }
    //update giỏ hàng
    public function updatecart(Request $rq)
    {
        $rowId = $rq->rowId;
        $qty = $rq->qty;
        Cart::update($rowId, $qty);
        return redirect(Route('cart'));
    }
    //remove sản phẩm
    public function getdelete($id)
    {
        Cart::remove($id);
        return redirect(Route('cart'));
    }
    //mua sản phẩm
    public function buy(){
        $carts=Cart::content();
        $total=Cart::subtotal();
        $hd= new Bill();
        $hd->CusID=1;
        $hd->BillDate= now();
        $hd->Total=$total;
        $hd->save();
        foreach($carts as $cart){
            $id=Bill::max('Bill_ID');
            $order= new Order();
            $order->OrderID=$id;
            $order->PID=$cart->id;
            $order->Amount=$cart->qty;
            $order->save();
            $product=Product::where('PID', $cart->id)->first();

            $product->PBuy=($product->PBuy) + ($cart->qty);
            // echo $product->PBuy; die();
            DB::update("update tblproduct set PBuy = $product->PBuy where PID = ?", [$cart->id]);
            $product->PAmount=$product->PAmount - $order->Amount;
            DB::update("update tblproduct set PAmount = $product->PAmount where PID = ?", [$cart->id]);
            // $product->save();
        }
        Cart::destroy();
        return redirect(Route('home'));
    }
    public function d(){
        Session::flush();
    }
}
