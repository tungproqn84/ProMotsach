<?php
namespace App\Http\Controllers;
use App\Bill;
use App\Category;
use App\Feedback;
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
    public function ShowPortfolio($portfolio_id) {
        $portfolio = Portfolio::where('PortfolioID',$portfolio_id)->first();
        return view('admin/showPortfolio', compact('portfolio'));
    }
    // Chèn danh mục
    public function InsertPortfolio(Request $request){
        $portfolio = new Portfolio;
        $portfolio->PortfolioName = request('PortfolioName');
        $portfolio->PortfolioDescription = request('PortfolioDescription');
        $portfolio->PortfolioStatus = request('PortfolioStatus');
        $portfolio->save();
        return redirect()->route('admin-portfolio');
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
    // hiển thị thông tin sản phẩm
    public function ShowProduct($product_id) {
        $product = Product::where('PID', $product_id)->first();
        return view('admin/showProduct', compact('product'));
    }

    // Trang thể loại
    public function getCategoryPage() {
        $categories = Category::all();
        return view('admin/Category', compact('categories'));
    }
    // Thêm thể loại
    public function AddCategory() {
        return view('admin/addCategory');
    }
    // chèn thể loại
    // public function InsertCategory() {
    //         // code
    // }
    // Xem thông tin thể 
    public function showCategory($category_id) {
        $category = Category::where('CategoryID',$category_id)->first();
        return view('admin/showCategory', compact('category'));
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
        $type='product';
        $cat=Category::all();
        $slide=Slide::all();
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'id', 'type'));
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
    public function getauthor($author)
    {
        $product=Product::where('PAuthor', $author)->paginate(6);
        $cat=Category::all();
        $slide=Slide::all();
        $type='author';
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'type'));
    }
    //feedback
    public function feedback(Request $rq)
    {
        $feedback=$rq->feedback;
        $tbl=new Feedback();
        $cus=Session::get('id');
        $tbl->CusID=$cus;
        $tbl->Feedback=$feedback;
        $tbl->save();
        return redirect(Route('home'));
    }
}
