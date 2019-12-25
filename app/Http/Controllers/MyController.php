<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Saleproduct;
use App\Slide;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function getindex()
    {
        $product=Product::where('PSale', 0)->limit(3)->get();
        $cat=Category::all();
        $slide=Slide::all();
        $sale= Product::where('PSale', '<>' ,0)->limit(3)->get();
        $hot=Product::orderby('PBuy', 'desc')->limit(3)->get();
        return view('index', compact('product', 'cat', 'slide', 'sale', 'hot'));
    }
    public function getcart()
    {

    }
    public function detailproduct($id)
    {
        $cat=Category::all();
        $slide=Slide::all();
        $product=Product::where('PID', $id)->first();
        return view('detailproduct', compact('product', 'cat', 'slide'));
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
        return view('xemthempro', compact('product', 'cat', 'slide'));
    }
}
