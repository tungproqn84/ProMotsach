<?php
namespace App\Http\Controllers;
use App\Bill;
use App\Category;
use App\Customer;
use App\Feedback;
use App\Order;
use App\Product;
use App\Saleproduct;
use App\Slide;
use Illuminate\Http\Request;
use App\Portfolio;
use App\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $portfolio = Portfolio::where('PortfolioID',$portfolio_id)->get();
        return view('admin/showPortfolio', compact('portfolio'));
    }
    //login
    public function getlogin(){
        return view('admin/login');
    }
    public function login(Request $rq)
    {
        $xacnhan= array('email'=>$rq->email,'password'=>$rq->password);
        if (($rq->email)=='admin') {
            Session::put('user', 'Admin');
            return view('admin/home');
        }
        else {
            if (Auth::attempt($xacnhan)) {
                $user=User::where('email', $rq->email)->first();
                Session::put('user', $user->name);
                Session::put('id', $user->id);
                return redirect(Route('home'));
            } else {
                return redirect()->back()->with('notice', "Sai tên đăng nhập hoặc mật khẩu");
                }
            }
    }
    //endlogin
    //logout
    public function getlogout(){
        Session::flush();
        return redirect(Route('login'));
    }
    //endlogout
    //signin
    public function getsignin()
    {
        // echo 'a'; die();
        return view('admin/signup');
    }
    public function postsignin(Request $rq){
        // $this->validate($rq,
        //     ['email'=>'required||unique:users,email','mobile'=>'required||unique:tblcustomer,Cellphone',''=>'required','address'=>'required'],
        //     ['email.unique'=>'Email này đã được đăng kí','mobile.unique'=>'Số điện thoại đã được đăng kí','name.required'=>'Tên của bạn còn trống','mobile.required'=>'Số điện thoại còn trống','address.required'=>'Địa chỉ của bạn còn trống','email.required'=>'Tên đăng nhập còn trống']
        // );
    // Chèn danh mục
    public function InsertPortfolio (Request $request)
    {
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

    // Trang thể loại
    public function getCategoryPage() {
        return view('admin/Category');
    }

        if($rq->gender=='nam')
            $gender=1;
        else
            $gender=0;
        $user=new User();
        $user->name=$rq->name;
        $user->email=$rq->email;
        $user->password= Hash::make($rq->password);
        $user->save();
        $customer= new Customer();
        $customer->CusName=$rq->name;
        $customer->Gender=$gender;
        $customer->DayOfBirth=$rq->dob;
        $customer->Cellphone=$rq->mobile;
        $customer->CusAddress=$rq->address;
        $customer->Email=$rq->email;
        $customer->Password=$rq->password;
        $customer->save();
        return redirect(Route('login'))->with("thanhcong","Tài khoản của bạn đã sẵn sàng để sử dụng");
    }
    //endsignin
// CONTROLLER CUSTOMER
    public function getindex()
    {
        $product=Product::where('PSale', 0)->limit(4)->get();
        $cat=Category::all();
        $slide=Slide::all();
        $sale= Product::where('PSale', '<>' ,0)->limit(4)->get();
        $hot=Product::orderby('PBuy', 'desc')->limit(4)->get();
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
            $product=Product::where('PSale', '<>', 0)->paginate(8);
        }
        elseif($id==2)
        {
            $product=Product::orderby('PBuy', 'desc')->paginate(8);
        }
        else
            $product=Product::paginate(8);
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
        if(Session::has('id'))
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
        else
            return redirect('login');

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
        $hd->CusID=Session::get('id');
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
        $product=Product::where('PAuthor', $author)->paginate(8);
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
    //tìm kiếm sản phẩm
    public function getsearch(Request $rq)
    {

        $product=Product::where('PName', 'like', '%'. $rq->search. '%')->paginate(8);
        // echo $rq->search; die();
        $cat=Category::all();
        $slide=Slide::all();
        $type='search';
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'type'));
    }
}
