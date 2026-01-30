<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use App\Models\ReplyMessage;
use App\Models\LaptopHireRequest;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Laptops For Hire | RoyalTech Computers Limited | Laptops for Leasing kenya - Laptops Rentals');
        SEOMeta::setDescription('Rent Laptops, Lease Laptops, Laptops for Hire,  Laptops in Kenya, Laptop Rentals in Kenya, Laptops Leasing in Kenya');
        SEOMeta::setCanonical(''.url('/').'');

        OpenGraph::setDescription('Rent Laptops, Lease Laptops, Laptops for Hire,  Laptops in Kenya, Laptop Rentals in Kenya, Laptops Leasing in Kenya');
        OpenGraph::setTitle('Laptops For Hire | RoyalTech Computers Limited | Laptops for Leasing kenya - Laptops Rentals');
        OpenGraph::setUrl(''.url('/').'');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Laptops For Hire | RoyalTech Computers Limited | Laptops for Leasing kenya - Laptops Rentals');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Laptops For Hire | RoyalTech Computers Limited | Laptops for Leasing kenya - Laptops Rentals');
        JsonLd::setDescription('Rent Laptops, Lease Laptops, Laptops for Hire,  Laptops in Kenya, Laptop Rentals in Kenya, Laptops Leasing in Kenya');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        return view('front.index');
    }

    public function center_of_excellence($slung){
        $Service = DB::table('services')->where('slung',$slung)->get();
        foreach ($Service as $key => $value) {
            # code...
            SEOMeta::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            SEOMeta::setCanonical(''.url('/').'/center-of-excellence/'.$slung.'');

            OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            OpenGraph::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            OpenGraph::setUrl(''.url('/').'/center-of-excellence/'.$slung.'');
            OpenGraph::addProperty('type', 'website');

            TwitterCard::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            TwitterCard::setSite('@RoyaltechC');

            JsonLd::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
            return view('front.center_of_excellence' ,compact('Service'));
        }
    }

    public function contact_us(){

        SEOMeta::setTitle('Contact Us | RoyalTech Computers Limited | Laptops For Hire');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.url('/').'/contact-us');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('Contact Us | RoyalTech Computers Limited | Laptops For Hire');
        OpenGraph::setUrl(''.url('/').'/contact-us');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Contact Us | RoyalTech Computers Limited | Laptops For Hire');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Contact Us | RoyalTech Computers Limited | Laptops For Hire');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        return view('front.contact_us');
    }
    public function company(){
        SEOMeta::setTitle('The Company | RoyalTech Computers Limited | Laptops For Hire');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.url('/').'/the-company');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('The Company | RoyalTech Computers Limited | Laptops For Hire');
        OpenGraph::setUrl(''.url('/').'/the-company');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('The Company | RoyalTech Computers Limited | Laptops For Hire');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('The Company | RoyalTech Computers Limited | Laptops For Hire');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        return view('front.company');
    }

    public function laptops_for_hire(){
        SEOMeta::setTitle('Laptops For Hire in Nairobi Kenya | Leasing | RoyalTech Computers Limited');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.url('/').'/laptops-for-hire');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('Laptops For Hire in Nairobi Kenya | Leasing | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/laptops-for-hire');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Laptops For Hire in Nairobi Kenya | Leasing | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Laptops For Hire in Nairobi Kenya | Leasing | RoyalTech Computers Limited');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        return view('front.laptops-for-hire');
    }

    public function macbooks_for_hire(){
        SEOMeta::setTitle('Macbooks for Hire | Apple Rentals | RoyalTech Computers Limited');
        SEOMeta::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Apple technology without the commitment of ownership. Contact us today');
        SEOMeta::setCanonical(''.url('/').'/macbooks-for-hire');

        OpenGraph::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Apple technology without the commitment of ownership. Contact us today');
        OpenGraph::setTitle('Macbooks for Hire | Apple Rentals | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/macbooks-for-hire');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Macbooks for Hire | Apple Rentals | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Macbooks for Hire | Apple Rentals | RoyalTech Computers Limited');
        JsonLd::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Apple technology without the commitment of ownership. Contact us today');
        JsonLd::addImage(''.url('/').'/uploads/m2-macbook-air-hero-4.webp');
        return view('front.macbook-for-hire');
    }

    public function tablets_for_hire(){
        SEOMeta::setTitle('Tablets for Hire | Tablets Rentals | RoyalTech Computers Limited');
        SEOMeta::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Tablets technology without the commitment of ownership. Contact us today');
        SEOMeta::setCanonical(''.url('/').'/tablets-for-hire');

        OpenGraph::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Tablets technology without the commitment of ownership. Contact us today');
        OpenGraph::setTitle('Tablets for Hire | Tablets Rentals | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/tablets-for-hire');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Tablets for Hire | Tablets Rentals | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Tablets for Hire | Tablets Rentals | RoyalTech Computers Limited');
        JsonLd::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Tablets technology without the commitment of ownership. Contact us today');
        JsonLd::addImage(''.url('/').'/uploads/m2-macbook-air-hero-4.webp');
        return view('front.tablets-for-hire');
    }
    
    public function projectors_for_hire(){
        SEOMeta::setTitle('Projectors for Hire | Projectors Rentals | RoyalTech Computers Limited');
        SEOMeta::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Projectors technology without the commitment of ownership. Contact us today');
        SEOMeta::setCanonical(''.url('/').'/projectors-for-hire');

        OpenGraph::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Projectors technology without the commitment of ownership. Contact us today');
        OpenGraph::setTitle('Projectors for Hire | Projectors Rentals | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/projectors-for-hire');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Projectors for Hire | Projectors Rentals | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Projectors for Hire | Projectors Rentals | RoyalTech Computers Limited');
        JsonLd::setDescription('Experience the power of innovation with our MacBook for hire service. Rent the latest MacBook models for short-term needs. Discover the convenience and performance of Projectors technology without the commitment of ownership. Contact us today');
        JsonLd::addImage(''.url('/').'/uploads/m2-macbook-air-hero-4.webp');
        return view('front.projectors-for-hire');
    }



    public function terms_and_conditions(){
        SEOMeta::setTitle('Terms and Conditions | RoyalTech Computers Limited');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.url('/').'/terms-and-conditions');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('Terms and Conditions | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/terms-and-conditions');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Terms and Conditions | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Terms and Conditions | RoyalTech Computers Limited');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        $Terms = DB::table('terms')->get();
        return view('front.terms-and-conditions', compact('Terms'));
    }

    public function copyright(){
        SEOMeta::setTitle('Copyright | RoyalTech Computers Limited');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.url('/').'/copyright');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('Copyright | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/copyright');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Copyright | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Copyright | RoyalTech Computers Limited');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        return view('front.copyright');
    }

    public function privacy_policy(){
        SEOMeta::setTitle('Privacy Policy | RoyalTech Computers Limited');
        SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        SEOMeta::setCanonical(''.url('/').'/privacy-policy');

        OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        OpenGraph::setTitle('Privacy Policy | RoyalTech Computers Limited');
        OpenGraph::setUrl(''.url('/').'/privacy-policy');
        OpenGraph::addProperty('type', 'website');

        TwitterCard::setTitle('Terms and Conditions | RoyalTech Computers Limited');
        TwitterCard::setSite('@RoyaltechC');

        JsonLd::setTitle('Privacy Policy | RoyalTech Computers Limited');
        JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
        JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');
        $Terms = DB::table('privacy')->get();
        return view('front.privacy-policy', compact('Terms'));
    }

    public function blogs($slung){
        $Blog = DB::table('blogs')->where('slung',$slung)->get();
        foreach ($Blog as $key => $value) {
            # code...
            SEOMeta::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            SEOMeta::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            SEOMeta::setCanonical(''.url('/').'/blogs/'.$slung.'');

            OpenGraph::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            OpenGraph::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            OpenGraph::setUrl(''.url('/').'/blogs/'.$slung.'');
            OpenGraph::addProperty('type', 'website');

            TwitterCard::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            TwitterCard::setSite('@RoyaltechC');

            JsonLd::setTitle(''.$value->title.' In Kenya | RoyalTech Computers Limited | Laptops For Hire');
            JsonLd::setDescription('Desktop Computers in Nairobi,Laptops,Audio and Video,Accessories,Bag Collection,Cameras and Accessories affordable computer accessories');
            JsonLd::addImage(''.url('/').'/uploads/Royaltech-Original-1.png');

            return view('front.blog' ,compact('Blog'));
        }
    }


    public function show(){
        $Table = DB::select('SHOW TABLES');
        foreach ($Table as $key => $value) {
            # code...
            echo $value->Tables_in_royal;
            echo ",";
        }

    }

    public function hire(Request $request){
        try {
            $check = $this->has_url($request->message);
            if($check == 1){
                if($request->verify_contact == $request->verify_contact_input){
                    $name = $request->name;
                    $email = $request->email;
                    $date = $request->date;
                    $phone = $request->phone;
                    $number = $request->number;
                    $message = $request->message;

                    // Save to database first
                    $hireRequest = null;
                    try {
                        $hireRequest = LaptopHireRequest::create([
                            'name' => $name,
                            'email' => $email,
                            'phone' => $phone,
                            'pickup_date' => $date,
                            'number_of_laptops' => $number,
                            'desired_specs' => $message,
                            'status' => 'pending',
                            'email_sent' => false
                        ]);
                    } catch (\Exception $dbException) {
                        \Log::error('Failed to save laptop hire request to database: ' . $dbException->getMessage(), [
                            'name' => $name,
                            'email' => $email,
                            'phone' => $phone,
                            'exception' => $dbException->getTraceAsString()
                        ]);
                        // Continue with email even if DB save fails
                    }

                    // Send email notification
                    $Joiner = "Hello Admin,\n\nUser Details:\n- Name: $name\n- Email: $email\n- Phone Number: $phone\n- Pick-up/Delivery Date: $date\n- Number of Laptops: $number\n- Desired Specs/Model: $message\n\nPlease contact the user to confirm the laptop hire request.";
                    
                    $emailResult = ReplyMessage::laptopHire($name, $email, $Joiner, $hireRequest);
                    
                    // Update email status if request was saved
                    if ($hireRequest) {
                        $hireRequest->email_sent = $emailResult['success'] ?? false;
                        $hireRequest->email_error = $emailResult['error'] ?? null;
                        $hireRequest->save();
                    }
                    
                    // Log email status
                    if (!($emailResult['success'] ?? false)) {
                        \Log::warning('Laptop hire email failed', [
                            'request_id' => $hireRequest->id ?? 'unknown',
                            'name' => $name,
                            'email' => $email,
                            'error' => $emailResult['error'] ?? 'Unknown error'
                        ]);
                    }
                    
                    // Always return success if database save worked, even if email fails
                    return response()->json([
                        'success' => true, 
                        'message' => 'Your request has been submitted successfully. We will get back to you soon.'
                    ]);
                }else{
                    return response()->json([
                        'success' => false, 
                        'message' => 'Security verification failed. Please check your answer and try again.'
                    ], 422);
                }
            }else{
                return response()->json([
                    'success' => false, 
                    'message' => 'Invalid message format. Please remove any URLs or email addresses from your message.'
                ], 422);
            }
        } catch (\Exception $e) {
            \Log::error('Laptop hire form error: ' . $e->getMessage(), [
                'request_data' => $request->except(['_token', 'verify_contact', 'verify_contact_input'])
            ]);
            return response()->json([
                'success' => false, 
                'message' => 'An error occurred. Please try again later or contact us directly.'
            ], 500);
        }
    }

    public function message(Request $request){
        $check = $this->has_url($request->message);
        if($check == 1){
            // Check if message has links
            if($request->verify_contact == $request->verify_contact_input){
                $name = $request->name;
                $email = $request->email;
                $subject = $request->subject;
                $phone = $request->phone;
                $message = $request->message;
                $Joiner = "Hello Admin, User with name $name, and email $email, Phone Number $phone and Website $subject : Has Sent an Enquiry as -> $message";
                ReplyMessage::sendMessage($name,$email,$Joiner);
                return response()->json(['success' => true]);
            }else{
                return response()->json(['success' => true]);
            }
        }else{
            return response()->json(['success' => true]);
        }

    }

    public function has_url($string){
        $url = "http";

        if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $string)){
            // die("Contains an email");
            $results = 0;
        }else{
            if( strpos($string , $url) == true) {
                // die("Contains an url");
                $results = 0;
            }else{
                $results = 1;
            }
        }
        return $results;

    }

}



