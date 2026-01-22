<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use Redirect;
use Session;
use Auth;

class ReplyMessage extends Model
{
    use HasFactory;
    public static function mailclient($email,$name,$invoicenumber,$ShippingFee,$TotalCost){
        $message = 'Hello '.$name.'';
        $subject = 'Your Invoice Has Been Created';
        $CartItems = \Cart::getContent();

        // Process Cart

        //The Generic mailler Goes here
        $data = array(
            'invoicenumber'=>$invoicenumber,
            'content'=>$message,
            'subject'=>$subject,
            'ShippingFee'=>$ShippingFee,
            'TotalCost'=>$TotalCost,
            'name'=>$name,
            'CartItems'=>$CartItems,

        );


        $appName = config('app.name');
        $appEmail = config('mail.username');

        $FromVariable = "royaltechcomputersltd@gmail.com";
        $FromVariableName = "RoyalTech Computers Limited";

        $toVariable = $email;

        $toVariableName = $name;


        Mail::send('mailclientInvoice', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->bcc('albertmuhatia@gmail.com')->cc('info@royaltech.co.ke')->cc('sales@royaltech.co.ke')->subject($subject);
        });
    }

    public static function mailmerchant($email,$name,$phone){
        $message = 'Hi, A person by name, '.$name.' and email address '.$email.' and phone number '.$phone.' Has purchases an item';
        $subject = 'New Order';
        //The Generic mailler Goes here
        $data = array(
            'name'=>$name,
            'email'=>$email,
            'content'=>$message,
            'service'=>$subject,

        );

        $FromVariable = "royaltechcomputersltd@gmail.com";
        $FromVariableName = "RoyalTech Computers Limited Mailers";

        $toVariable = "info@royaltech.co.ke";
        $toVariableName = "Royaltech Compuers Limited Admin";



        Mail::send('mailclienttwo', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('sales@royaltech.co.ke')->cc('albertmuhatia@gmail.com')->subject($subject);
        });
    }

    public static function messageClient($email,$name){
        //The Generic mailler Goes here
        $url = ('/privacy');
        $messageee = 'Hi '.$name.',
        You have created an account with Aste Company Limited,
        Should you require to update your info please login to the clients dashboard,
        Go to profile settings and update your info
         <br>
         Your info is safe with us in accordance to our <a href="https://aste.co.ke/privacy-policy">privacy policy</a>. ';
        $data = array(


            'content'=>$messageee,



        );
        $subject = "Account Created!";
        $appName = config('app.name');
        $appEmail = config('mail.username');


        $FromVariable = "aste.co.ke@gmail.com";
        $FromVariableName = "Aste Company Limited";

        $toVariable = $email;

        $toVariableName = $name;


        Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('sales@royaltech.co.ke')->cc('info@aste.co.ke')->subject($subject);
        });
    }

    public static function laptopHire($name,$email,$Joiner){
        $data = array(
            'content'=>$Joiner
        );
        $subject = "Laptop Hire";

        $FromVariable = "royaltechcomputersltd@gmail.com";
        $FromVariableName = "Royaltech Company Limited";

        $toVariable = "info@royaltech.co.ke";

        $toVariableName = "Royaltech Computers Limited";

        Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName,$email){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('sales@royaltech.co.ke')->bcc('albertmuhatia@gmail.com')->replyto($email)->subject($subject);
        });
    }

    public static function sendMessage($name,$email,$Joiner){
        $data = array(
            'content'=>$Joiner
        );
        $subject = "New Message";

        $FromVariable = "royaltechcomputersltd@gmail.com";
        $FromVariableName = "Royaltech Company Limited";

        $toVariable = "info@royaltech.co.ke";

        $toVariableName = "Royaltech Computers Limited";

        Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName,$email){
            $message->from($FromVariable , $FromVariableName);
            $message->to($toVariable, $toVariableName)->cc('sales@royaltech.co.ke')->bcc('albertmuhatia@gmail.com')->replyto($email)->subject($subject);
        });
    }

}
