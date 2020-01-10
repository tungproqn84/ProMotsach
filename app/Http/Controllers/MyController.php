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
use Carbon\Carbon;
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
        $count_customer = Customer::count();
        $count_product  = Product::count();
        return view('admin/home', compact('count_customer', 'count_product'));
    }

    // gọi trang khách hàng
    public function getCustomerPage() {
        $customers = Customer::all();
        return view('admin.customer', compact('customers'));
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
    // xóa danh mục
    public function DeletePortfolio($portfolio_id) {
        $portfolio = Portfolio::where('PortfolioID', $portfolio_id)->delete();
        return redirect()->back();
    }
    // sửa danh mục
    public function EditPortfolio($portfolio_id){
        $portfolio = Portfolio::where('PortfolioID', $portfolio_id)->first();
        return view('admin.editPortfolio', compact('portfolio'));
    }
    // cập nhật danh mục
    public function UpdatePortfolio(Request $request) {
        $portfolio = Portfolio::where('PortfolioID', $request->PortfolioID)->first();
        if(isset($portfolio)) {
            $portfolio->PortfolioName        = $request->PortfolioName;
            $portfolio->PortfolioDescription = $request->PortfolioDescription;
            $portfolio->PortfolioStatus      = $request->PortfolioStatus;
            $portfolio->save();
            $portfolios = Portfolio::all();
            return view('admin/portfolio', compact('portfolios'));
            
        }
    }
    //login
    public function getlogin(){
        return view('admin/login');
    }
    public function login(Request $rq)
    {
        $xacnhan = array('email'=>$rq->email,'password'=>$rq->password);
        if (($rq->email)=='admin') {
            Session:: put('user', 'Admin');
            return view('admin/home');
        }
        else {
            if (Auth::attempt($xacnhan)) {
                $user=User:: where('email', $rq->email)->first();
                      Session:: put('user', $user->name);
                      Session:: put('id', $user->id);
                return redirect(Route('home'));
            } else {
                return redirect()->back()->with('notice', "Sai tên đăng nhập hoặc mật khẩu");
                }
            }
    }
    //endlogin
    //logout
    public function getlogout(){
        Session:: flush();
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
        if($rq->gender=='nam')
            $gender = 1;
        else
            $gender         = 0;
            $user           = new User();
            $user->name     = $rq->name;
            $user->email    = $rq->email;
            $user->password = Hash::make($rq->password);
            $user->save();
            $customer             = new Customer();
            $customer->CusName    = $rq->name;
            $customer->Gender     = $gender;
            $customer->DayOfBirth = $rq->dob;
            $customer->Cellphone  = $rq->mobile;
            $customer->CusAddress = $rq->address;
            $customer->Email      = $rq->email;
            $customer->Password   = $rq->password;
            $customer->save();
            return redirect(Route('login'))->with("thanhcong","Tài khoản của bạn đã sẵn sàng để sử dụng");
    }
    // Chèn danh mục
    public function InsertPortfolio (Request $request)
    {
        $portfolio                       = new Portfolio;
        $portfolio->PortfolioName        = request('PortfolioName');
        $portfolio->PortfolioDescription = request('PortfolioDescription');
        $portfolio->PortfolioStatus      = request('PortfolioStatus');

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
        $categories = Category::all();
        return view('admin/AddProduct', compact('portfolios', 'categories'));
    }
    // hiển thị thông tin sản phẩm
    public function ShowProduct($product_id) {
        $product   = Product::where('PID', $product_id)->first();
        $portfolio = Portfolio::where('PortfolioID', $product->PPortfolio)->first();
        $category  = Category::where('CategoryyID', $product->PCategory)->first();
        return view('admin/showProduct', compact('product', 'portfolio', 'category'));
    }
    // chèn sản phẩm
    public function InsertProduct(Request $request) {
        $product             = new Product;
        $startday            = Carbon::now();
        $product->PName      = request('ProductName');
        $product->PAuthor    = request('Author');
        $product->PAmount    = request('Amount');
        $product->PPortfolio = request('Portfolio');
        $product->PCategory  = request('Category');
        $product->PStartDay  = $startday;
        $product->PImage     = request('Image');
        $product->PDetail    = request('Detail');
        $product->PStatus    = request('Status');
        $product->PPrice     = request('Price');
        $product->PSale      = 0;
        $product->PBuy       = 0;
        $product->save();
        return redirect()->route('admin-product');
    }
    // xóa sản phẩm
    public function DeleteProduct($product_id) {
        $product = Product::where('PID', $product_id)->delete();
        return redirect()->back();
    }

    // sửa sản phẩm
    public function EditProduct($product_id){
        $portfolios = Portfolio::all();
        $categories = Category::all();
        $product    = Product::where('PID', $product_id)->first();
        return view('admin.editProduct', compact('product','portfolios', 'categories'));
    }
    // cập nhật sản phẩm
    public function UpdateProduct(Request $request) {
        $product = Product::where('PID', $request->PID)->first();
        if(isset($product)) {
            $product->PName      = request('ProductName');
            $product->PAuthor    = request('Author');
            $product->PAmount    = request('Amount');
            $product->PPortfolio = request('Portfolio');
            $product->PCategory  = request('Category');
            $product->PImage     = request('Image');
            $product->PDetail    = request('Detail');
            $product->PStatus    = request('Status');
            $product->PPrice     = request('Price');
            $product->PSale      = 0;
            $product->PBuy       = 0;
            $product->save();
        }
            $products = Product::all();
            return view('admin/product', compact('products'));
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
    // xóa danh mục
    public function DeleteCategory($category_id) {
        $category = Category::where('CategoryyID', $category_id)->delete();
        return redirect()->back();
    }
    // chèn thể loại
    // public function InsertCategory() {
    //         // code
    // }
    // Xem thông tin thể
    public function InsertCategory(Request $request) {
            $category                      = new Category;
            $startday                      = Carbon::now();
            $category->CategoryName        = request('CategoryName');
            $category->CategoryDescription = request('CategoryDescription');
            $category->CategoryStatus      = request('CategoryStatus');
            $category->StartDay            = $startday;
            $category->save();
            return redirect()->route('admin-category');
    }
    // Xem thông tin thể
    public function showCategory($category_id) {
        $category = Category::where('CategoryyID',$category_id)->first();
        return view('admin.showCategory', compact('category'));


    }
    // sửa thể loại
    public function EditCategory($category_id){
        $category = Category::where('CategoryyID', $category_id)->first();
        return view('admin.editCategory', compact('category'));
    }
    // cập nhật thể loại
    public function UpdateCategory(Request $request) {
        $portfolio = Category::where('CategoryyID', $request->CategoryID)->first();
        if(isset($portfolio)) {
            $category->CategoryName        = $request->CategoryName;
            $category->CategoryDescription = $request->CategoryDescription;
            $category->CategoryStatus      = $request->CategoryStatus;
            $category->save();
            $categories = Portfolio::all();
            return view('admin.Category', compact('categories'));
            
        }
    }

    // Trang bill
    public function getBillPage() {
        $bills     = Bill::all();
        $customers = Customer::all();
        return view('admin.bill', compact('bills', 'customers'));
    }

    // thông tin hóa đơn
    public function ShowBill($bill_id) {
        $bill     = Bill::where('Bill_ID', $bill_id)->first();
        $customer = Customer::where('CusID', $bill->CusID)->first();
        $orders = Order::where('OrderID', $bill->Bill_ID)->get();
        foreach($orders as $row) {
            $array[] = (int)$row->PID;
        }
        $PIDs = implode(",", $array);
        $products = Product::whereIn('PID', [2,8])->orderBy('PID', 'ASC')->get();
        $billDate    = Carbon::now();
        return view('admin.showBill', compact('bill', 'customer', 'billDate', 'orders', 'products'));
    }

// CONTROLLER CUSTOMER
    public function getindex()
    {
        $product = Product::where('PSale', 0)->limit(4)->get();
        $cat     = Category::all();
        $slide   = Slide::all();
        $sale    = Product::where('PSale', '<>' ,0)->limit(4)->get();
        $hot     = Product::orderby('PBuy', 'desc')->limit(4)->get();
        return view('customer/index', compact('product', 'cat', 'slide', 'sale', 'hot'));
    }
    public function detailproduct($id)
    {
        $cat          = Category::all();
        $slide        = Slide::all();
        $product      = Product::where('PID', $id)->first();
        $idmore       = $product->PCategory;
        $more_product = Product::where('PCategory', $idmore)->limit(4)->get();
        return view('customer/detailproduct', compact('product', 'cat', 'slide', 'more_product'));
    }
    public function getsee($id)
    {
        if($id==1)
        {
            $product = Product::where('PSale', '<>', 0)->paginate(8);
        }
        elseif($id==2)
        {
            $product = Product::orderby('PBuy', 'desc')->paginate(8);
        }
        else
            $product = Product::paginate(8);
            $type    = 'product';
            $cat     = Category::all();
            $slide   = Slide::all();
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'id', 'type'));
    }
    //cart
    public function getcart()
    {
        $cat  = Category::all();
        $cart = Cart::content();
        $pro  = Product::all();
        return view('customer/cart', compact('cart', 'pro', 'cat'));
    }
    public function addcart($id)
    {
        if(Session::has('id'))
        {
            $product = Product::where('PID', $id)-> first();
            if($product->PSale==0)
                $price = $product->PPrice;
            else
                $price = $product->PPrice - $product->PPrice*$product->PSale;
                $image = $product->PImage;
                    //   print_r($product); die();
                Cart:: add(array('id' => $id, 'name' => $product->PName, 'qty' => 1, 'price' => $price,'image'=>$image, 'weight'=>0));
                $cart = Cart:: content();
                $pro =Product:: all();
                return view('customer/cart', array('cart' => $cart,'product'=>$product),compact('pro'));
        }
        else
            return redirect('login');

            $price = $product->PPrice - $product->PPrice*$product->PSale;
            $image = $product->PImage;
                //   print_r($product); die();
            Cart:: add(array('id' => $id, 'name' => $product->PName, 'qty' => 1, 'price' => $price,'image'=>$image, 'weight'=>0));
            $cart = Cart:: content();
            $pro =Product:: all();
            return view('customer/cart', array('cart' => $cart,'product'=>$product),compact('pro'));
    }
    public function deletecart()
    {
        Cart:: destroy();
        return redirect(Route('home'));
    }
    //update giỏ hàng
    public function updatecart(Request $rq)
    {
        $rowId = $rq->rowId;
        $qty   = $rq->qty;
        Cart:: update($rowId, $qty);
        return redirect(Route('cart'));
    }
    //remove sản phẩm
    public function getdelete($id)
    {
        Cart:: remove($id);
        return redirect(Route('cart'));
    }
    //mua sản phẩm
    public function buy(){
        $carts        = Cart::content();
        $total        = Cart::subtotal();
        $hd           = new Bill();
        $hd->CusID    = Session::get('id');
        $hd->BillDate = now();
        $hd->Total    = $total;
        $hd->save();
        foreach($carts as $cart){
            $id             = Bill::max('Bill_ID');
            $order          = new Order();
            $order->OrderID = $id;
            $order->PID     = $cart->id;
            $order->Amount  = $cart->qty;
            $order->save();
            $product = Product::where('PID', $cart->id)->first();

            $product->PBuy = ($product->PBuy) + ($cart->qty);
            // echo $product->PBuy; die();
            DB:: update("update tblproduct set PBuy = $product->PBuy where PID = ?", [$cart->id]);
            $product->PAmount = $product->PAmount - $order->Amount;
            DB:: update("update tblproduct set PAmount = $product->PAmount where PID = ?", [$cart->id]);
            // $product->save();
        }
        Cart:: destroy();
        return redirect(Route('home'));
    }
    public function getauthor($author)
    {
        $product = Product::where('PAuthor', $author)->paginate(8);
        $cat     = Category::all();
        $slide   = Slide::all();
        $type    = 'author';
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'type'));
    }
    //feedback
    public function feedback(Request $rq)
    {
        $feedback      = $rq->feedback;
        $tbl           = new Feedback();
        $cus           = Session::get('id');
        $tbl->CusID    = $cus;
        $tbl->Feedback = $feedback;
        $tbl->save();
        return redirect(Route('home'));
    }
    //tìm kiếm sản phẩm
    public function getsearch(Request $rq)
    {

        $product = Product::where('PName', 'like', '%'. $rq->search. '%')->paginate(8);
        // echo $rq->search; die();
        $cat   = Category::all();
        $slide = Slide::all();
        $type  = 'search';
        return view('customer/xemthempro', compact('product', 'cat', 'slide', 'type'));
    }
    //liên hệ
    public function getcontact(){
        $cat   = Category::all();
        $slide = Slide::all();
        return view('customer/contact', compact('cat','slide'));
    }
    public function postcontact(Request $rq)
    {

    }
}
