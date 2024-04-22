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

        $aboutImage = About_img::all();

        return response()->json($aboutImage);
    }

    public function getAboutPoint()
    {

        $aboutPoint = About_point::all();

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
        $offer = Offer::where('active', '=', '1')->get();

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
        $category = Category::where('name', '=', $name)->get();

        $product = Product::where('category_id', '=', $category->id)->get();

        return response()->json($product);
    }

    public function getProductsBySort(Request $request)
    {
        $sortOption = $request->input('sort_option');
        $categoryName = $request->input('category_name');

        // Get products associated with the category name
        $products = Product::where('category_name', $categoryName);

        if ($sortOption === 'price-asc') {
            // Order products by the minimum price among their associated sizes in ascending order
            $products->orderBy(function ($query) {
                $query->select('price')
                    ->from('sizes')
                    ->whereColumn('sizes.product_id', 'products.id')
                    ->orderBy('price', 'asc')
                    ->limit(1);
            });
        } elseif ($sortOption === 'price-desc') {
            // Order products by the maximum price among their associated sizes in descending order
            $products->orderByDesc(function ($query) {
                $query->select('price')
                    ->from('sizes')
                    ->whereColumn('sizes.product_id', 'products.id')
                    ->orderBy('price', 'desc')
                    ->limit(1);
            });
        } else {
            return response()->json(['error' => 'Invalid sort option'], 400);
        }

        // Retrieve the sorted products
        $sortedProducts = $products->get();

        // Iterate through sorted products to fetch and include size prices and product images
        foreach ($sortedProducts as $product) {
            // Fetch size prices for the current product
            $sizePrices = Size::where('product_id', $product->id)->pluck('price')->toArray();

            // Include size prices in the product object
            $product->size_prices = $sizePrices;

            // Fetch product images for the current product
            $productImages = ProductImage::where('product_id', $product->id)->pluck('img')->toArray();

            // Include product images in the product object
            $product->product_images = $productImages;
        }

        return response()->json($sortedProducts);
    }






}
