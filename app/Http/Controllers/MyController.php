<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Saleproduct;
use App\Slide;
use Illuminate\Http\Request;
use App\Portfolio;

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
    
    public function AddPortfolio() {
        return view('admin/addPortfolio');
    }

// CONTROLLER CUSTOMER
    public function getindex()
    {
        $product=Product::where('PSale', 0)->limit(3)->get();
        $cat=Category::all();
        $slide=Slide::all();
        $sale= Product::where('PSale', '<>' ,0)->limit(3)->get();
        $hot=Product::orderby('PBuy', 'desc')->limit(3)->get();
<<<<<<< HEAD
        return view('index', compact('product', 'cat', 'slide', 'sale', 'hot'));
=======
        return view('customer/index', compact('product', 'cat', 'slide', 'sale', 'hot'));
>>>>>>> b240f84293fccf3611cf5dd12e21c3d053c31c33
    }
    public function getcart()
    {

    }
    public function detailproduct($id)
    {
        $cat=Category::all();
        $slide=Slide::all();
        $product=Product::where('PID', $id)->first();
<<<<<<< HEAD
        return view('detailproduct', compact('product', 'cat', 'slide'));
=======
        return view('customer/detailproduct', compact('product', 'cat', 'slide'));
>>>>>>> b240f84293fccf3611cf5dd12e21c3d053c31c33
    }
    public function getsee($id){
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
        return view('xemthempro', compact('product', 'cat', 'slide'));
=======
        return view('customer/xemthempro', compact('product', 'cat', 'slide'));
>>>>>>> b240f84293fccf3611cf5dd12e21c3d053c31c33
    }
}
