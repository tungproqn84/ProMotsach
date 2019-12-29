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
    // Thêm danh mục
    public function AddPortfolio() {
        return view('admin/addPortfolio');
    }
    // Hiển thị thông tin danh mục
    public function ShowPortfolio($portfolio_id) {
        $portfolio = Portfolio::where('PortfolioID',$portfolio_id)->get();
        return view('admin/showPortfolio', compact('portfolio'));
    }

    // gọi trang sản phẩm
    public function getProductPage() {
        $products = Product::all();
        return view('admin/product', compact('products'));
    }
    
    // Thêm sản phẩm
    public function AddProduct() {
        $portfolios = Portfolio::all();
        return view('admin/AddProduct', compact('portfolios'));
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
    // public function getdelete($id)
    // {
    // $cart= Cart::content();
    //     $rowId = Cart::search(array('id' => $id));
    //     Cart::remove($rowId);
    //     return view('customer/cart');
    // }
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
        $hd->CusID=1;
        $hd->BillDate= now();
        $hd->Total=$total;
        $hd->save();
        foreach($cart as $ca){
            $id=Bill::max('Bill_ID');
            $de= new Order();
            $de->OrderID=$id;
            $de->PID=$ca->id;
            $de->Amount=$ca->qty;
            $de->save();
            $product=Product::find($de->PID);
            $product->soluong=$product->PAmount - $de->Amount;
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
