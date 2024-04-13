<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\General;
use App\Models\Promo;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Privacy;
use App\Models\Term;
use App\Models\Collection;
use App\Models\Transaction;
use App\Models\Testimonial;
use App\Models\Landing;
use App\Models\Smell;
use App\Models\Tag;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Social;
use App\Models\About;
use App\Models\Category;
use App\Models\About_img;
use App\Models\About_point;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAbout()
    {

        $about = About::find(1);

        return response()->json($about);

    }

    public function getAboutImage()
    {

        $aboutImage = About_img::find(1);

        return response()->json($aboutImage);

    }

    public function getAboutPoint()
    {

        $aboutPoint = About_point::find(1);

        return response()->json($aboutPoint);

    }

    public function getCategory()
    {
        $category = Category::all();

        return response()->json($category);
    }

    public function getProduct()
    {
        $product = Product::all();

        return response()->json($product);
    }

    public function getProductImage()
    {
        $productImage = ProductImage::all();

        return response()->json($productImage);
    }

    public function getProductImageFirst($productId)
    {
        $productImage = ProductImage::where('product_id', $productId)->first();

        return response()->json($productImage);
    }


    public function getSocial()
    {
        $social = Social::find(1);

        return response()->json($social);
    }

    public function getSize()
    {
        $size = Size::all();

        return response()->json($size);
    }

    public function getSmell()
    {
        $smell = Smell::all();

        return response()->json($smell);
    }

    public function getTag()
    {
        $tag = Tag::all();

        return response()->json($tag);
    }

    public function getLanding()
    {
        $landing = Landing::all();

        return response()->json($landing);
    }

    public function getTestimonial()
    {
        $testimonial = Testimonial::all();

        return response()->json($testimonial);
    }

    public function getCollection()
    {
        $collection = Collection::all();

        return response()->json($collection);
    }

    public function getTransaction()
    {
        $transaction = Transaction::all();

        return response()->json($transaction);
    }

    public function getTerm()
    {
        $term = Term::all();

        return response()->json($term);
    }

    public function getPrivacy()
    {
        $privacy = Privacy::all();

        return response()->json($privacy);
    }

    public function getOrder()
    {
        $order = Order::all();

        return response()->json($order);
    }

    public function getOffer()
    {
        $offer = Offer::where('active','=','1')->get();

        return response()->json($offer);
    }

    public function getPromo()
    {
        $promo = Promo::all();

        return response()->json($promo);
    }

    public function getGeneral()
    {
        $general = General::find(1);

        return response()->json($general);
    }

    public function getCart()
    {
        $cart = Cart::all();

        return response()->json($cart);
    }

    public function getCategoryProducts($name)
    {
        $category = Category::where('name' , '=' , $name)->get();

        $product = Product::where('category_id' , '=' ,$category->id)->get();

        return response()->json($product);
    }



    }




