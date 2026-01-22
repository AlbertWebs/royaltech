<?php

namespace App\Models;
use Mail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMails extends Model
{
    use HasFactory;
    public static function contact_form($name,$email,$subject,$message){ 
        //The Generic mailler Goes here
        $messageee = ''.$message.'';
        $data = array(
            'content'=>$messageee,
            'name'=>$name,
            'email'=>$email,
            'subject'=>$subject,
        );

        $subject = "Contact Form: $subject";
     
        $appEmail = 'mailer@aste-aste.com';
    
    
        $SenderEmail = $email;
        $SenderName = $name;

        $toVariable = $appEmail;

        $toVariableName = 'Aste E-commerce';


        Mail::send('mailTheme', $data, function($message) use ($subject,$SenderEmail,$SenderName,$toVariable,$toVariableName,$email,$name){
            $message->from($SenderEmail , $SenderName);
            $message->to($toVariable, $toVariableName)->cc('albertmuhatia@gmail.com')->replyTo($SenderEmail, $SenderName)->subject($subject);
        });
    }

    public static function approvePayment($name,$email,$subject,$message){ 
        //The Generic mailler Goes here
        $messageee = ''.$message.'';
        $data = array(
            'content'=>$messageee,
            'name'=>$name,
            'email'=>$email,
            'subject'=>$subject,
        );

        $subject = "$subject";
     
        $appEmail = 'mailer@pipdotfx.com';
    
    
        $SenderEmail = $email;
        $SenderName = $name;

        $toVariable = $appEmail;

        $toVariableName = 'Aste E-commerce';


        Mail::send('mailTheme', $data, function($message) use ($subject,$SenderEmail,$SenderName,$toVariable,$toVariableName,$email,$name){
            $message->from($toVariable , $toVariableName);
            $message->to($SenderEmail, $SenderName)->cc('albertmuhatia@gmail.com')->replyTo($toVariable, $toVariableName)->subject($subject);
        });
    }

}
