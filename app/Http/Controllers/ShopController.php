<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
// use Wishlistable;
use App\Models\User;
use Pesapal;
use App\Models\orders;
use Auth;
use App\Models\Payment;
use App\Models\ReplyMessage;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Session;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;


class ShopController extends Controller
{
    public function index()
    {
        Session::forget('tags');
        $url = url('/');
        SEOMeta::setTitle('Laptops Shop In Kenya | RoyalTech Computers Limited | Laptops in Kenya');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.$url.'/e-commerce');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('Laptops Shop In Kenya | RoyalTech Computers Limited | Laptops in Kenya');
        OpenGraph::setUrl(''.$url.'/e-commerce');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Laptops Shop In Kenya | RoyalTech Computers Limited | Laptops in Kenya');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Laptops Shop In Kenya | RoyalTech Computers Limited | Laptops in Kenya');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.$url.'/uploads/Royaltech-Original-1.png');
        $Products = DB::table('products')->orderBy('id','DESC')->get();
        $title = "All Products";
        return view('shop.index', compact('Products','title'));
    }

    public function product($slung)
    {
        Session::forget('tags');
        $url = url('/');
        $Products = DB::table('products')->where('slung',$slung)->get();
        foreach ($Products as $key => $value) {
            SEOMeta::setTitle(''.$value->name.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            SEOMeta::setCanonical(''.$url.'/e-commerce/product/'.$slung.'');

            OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            OpenGraph::setTitle(''.$value->name.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            OpenGraph::setUrl(''.$url.'/e-commerce/product/'.$slung.'');
            OpenGraph::addProperty('type', 'articles');

            TwitterCard::setTitle(''.$value->name.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            TwitterCard::setSite('@RoyaltechC');

            JsonLd::setTitle(''.$value->name.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            JsonLd::addImage(''.$url.'/uploads/Royaltech-Original-1.png');

            return view('shop.product', compact('Products'));
        }
    }

    public function brand($slung)
    {
        // Set Session
        Session::forget('tags');
        $url = url('/');
            SEOMeta::setTitle(''.$slung.' In Kenya | RoyalTech Computers Limited | Laptops Hire in Kenya');
            SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            SEOMeta::setCanonical(''.$url.'/e-commerce/product/brand/'.$slung.'');

            OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            OpenGraph::setTitle(''.$slung.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            OpenGraph::setUrl(''.$url.'/e-commerce/product/brand/'.$slung.'');
            OpenGraph::addProperty('type', 'articles');

            TwitterCard::setTitle(''.$slung.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            TwitterCard::setSite('@RoyaltechC');

            JsonLd::setTitle(''.$slung.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
            JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            JsonLd::addImage(''.$url.'/uploads/Royaltech-Original-1.png');
        $Products = DB::table('products')->where('brand',$slung)->get();
        $title = $slung;
        return view('shop.index', compact('Products','title'));
    }

    public function tags($slung)
    {
        $Category =DB::table('categories')->where('slung',$slung)->get();
        foreach($Category as $Cat){
        $url = url('/');
        SEOMeta::setTitle(''.$Cat->title.' In Kenya | RoyalTech Computers Limited | Laptops Hire in Kenya');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.$url.'/e-commerce/product/tags/'.$slung.'');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle(''.$slung.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
        OpenGraph::setUrl(''.$url.'/e-commerce/product/tags/'.$slung.'');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle(''.$slung.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle(''.$slung.' | RoyalTech Computers Limited | Laptops Hire in Kenya');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.$url.'/uploads/Royaltech-Original-1.png');

            $Products = DB::table('products')->where('category',$Cat->id)->get();
            $title = $Cat->title;
        }
        //set Sesion
        Session::put('tags',$slung);
        return view('shop.index', compact('Products','title'));
    }



    public function quick_view($slung)
    {
        $Products = DB::table('products')->where('slung',$slung)->get();
        return view('shop.quick', compact('Products'));
    }
    public function cart()
    {
        $cartItems = \Cart::getContent();
        if($cartItems->isEmpty()){
            $Products = Product::all();
            $title = "All Products";
            return view('shop.index', compact('Products','title'));
        }else{
            return view('shop.cart', compact('cartItems'));
        }
    }

    public function checkout()
    {
        $cartItems = \Cart::getContent();
        $Shipping = 400;
        $Total = \Cart::getTotal();
        $Sum = $Shipping+$Total;
        foreach($cartItems as $ca){
            $name = $ca->name;
            $description = $name."";
            // echo $description;
            Session::put('description', $description);
        }

        Session::put('amount', $Sum);


        if(Auth::User()){
            if($cartItems->isEmpty()){
                $Products = DB::table('products')->orderBy('id','DESC')->get();
                $title = "All Products";
                return view('shop.index', compact('Products','title'));
            }else{
                $title = "All Products";
                return view('shop.checkout', compact('cartItems'));
            }
        }else{
            return redirect()->route('login');
        }
    }






    public function add_to_cart($id)
    {
        $Product = Product::find($id);
        \Cart::add([
            'id' => $Product->id,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 1,
            'attributes' => array(
            'image' => $Product->image_one,
            )
        ]);
        $url = url('/');
        return response()->json([
            'id' => $Product->id,
            'name' => $Product->name,
            'slung' => $Product->slung,
            'price' => $Product->price,
            'quantity' => 1,
            'image' => $Product->image_one,
        ]);

    }

    public function add_to_wishlist($id)
    {
        $Product = Product::find($id);
        \Cart::add([
            'id' => $Product->id,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 1,
            'attributes' => array(
            'image' => $Product->image_one,
            )
        ]);
        $url = url('/');
        return response()->json([
            'id' => $Product->id,
            'name' => $Product->name,
            'slung' => $Product->slung,
            'price' => $Product->price,
            'quantity' => 1,
            'image' => $Product->image_one,
        ]);

    }



    public function removeCart($id)
    {
        \Cart::remove($id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function make_payments()
    {

         // getOrderID
        // PlaceOrder
        orders::createOrder();
        $latest = orders::orderBy('date','DESC')->first();
        $OrderId = $latest->id;
        // echo $OrderId;

        $Count = \Cart::getContent()->count();
        $Shipping = 700;
        $Ship = ($Shipping)*$Count;
        $Tot = \Cart::getTotal();
        $All = $Ship+$Tot;


        // $amount = $All;
        $amount = "1000";
        $description = Session::get('description');
        $payments = new Payment;
        $payments -> businessid = 1; //Business ID
        $payments -> transactionid = Pesapal::random_reference();
        $payments -> status = 'NEW'; //if user gets to iframe then exits, i prefer to have that as a new/lost transaction, not pending
        $payments -> amount = (int)$amount;
        $payments -> currency = "KES";
        $payments -> user_id = Auth::User()->id;
        $payments -> order_id = $OrderId;
        $payments -> save();

        // Email Order
        ReplyMessage::mailclient(Auth::User()->email,Auth::User()->name,$OrderId,$Ship,$All);

        ReplyMessage::mailmerchant(Auth::User()->email,Auth::User()->name,Auth::User()->mobile);


        $details = array(
            'amount' => $payments -> amount,
            'description' => $description,
            'type' => 'MERCHANT',
            'first_name' => Auth::User()->name,
            'last_name' => Auth::User()->id,
            'email' => Auth::User()->email,
            'phonenumber' => Auth::User()->mobile,
            'reference' => $payments -> transactionid,
            'height'=>'400px',
            'currency' => 'KES'
        );
        // dd($details);
        $iframe=Pesapal::makePayment($details);
        $cartItems = \Cart::getContent();

        // return view('payments.business.pesapal', compact('iframe'));
        return view('shop.checkout-payment', compact('iframe','cartItems'));
    }



    public function update(Request $request){
        $name = $request->name;
        $notes = $request->notes;
        $email = $request->email;
        $mobile = $request->mobile;
        $company = $request->company;
        $address = $request->address;
        $country = $request->country;

        $updateDetails = array(
            'name'=>$name,
            'notes'=>$notes,
            'email'=>$email,
            'mobile'=>$mobile,
            'company'=>$company,
            'address'=>$address,
            'country'=>$country,
        );

        DB::table('users')->where('id', Auth::User()->id)->update($updateDetails);
        return redirect()->route('payment');

    }

    public function searchsite(Request $request)
    {
        $url = url('/');
        $keywords = '';
        $category = $request->category;
        $search = $request->keyword;


        $Products = DB::table('products')->where('name', 'like', '%' . $request->keyword . '%')->paginate(200);
        $page_name = $request->search;
        $page_title = $request->search;
        $search_results = $search;
        $search_results_category = 'All Categories';


            SEOMeta::setTitle(''.$search.' In Kenya | RoyalTech Computers Limited | Laptops Hire in Kenya');
            SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            SEOMeta::setCanonical(''.$url.'/e-commerce/product/tags/'.$search.'');

            OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            OpenGraph::setTitle(''.$search.' In Kenya | RoyalTech Computers Limited | Laptops Hire in Kenya');
            OpenGraph::setUrl(''.$url.'/e-commerce/product/tags/'.$search.'');
            OpenGraph::addProperty('type', 'articles');

            TwitterCard::setTitle(''.$search.' In Kenya | RoyalTech Computers Limited | Laptops Hire in Kenya');
            TwitterCard::setSite('@RoyaltechC');

            JsonLd::setTitle(''.$search.' In Kenya | RoyalTech Computers Limited | Laptops Hire in Kenya');
            JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            JsonLd::addImage(''.$url.'/uploads/Royaltech-Original-1.png');

            $title = $page_title;

            // Call Route
            // return redirect()->route('search-results', ['ProductsTag'=>$ProductsTag,'ProductsBrand'=>$ProductsBrand,'ProductsCategory'=>$ProductsCategory]);

            return view('shop.index', compact('title','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));







    }
}
