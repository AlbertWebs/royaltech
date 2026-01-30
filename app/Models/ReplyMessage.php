<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\SentMessage;
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

    public static function laptopHire($name, $email, $Joiner, $hireRequest = null){
        $data = array(
            'content'=>$Joiner
        );
        $subject = "Laptop Hire Request";
        $FromVariable = "royaltechcomputersltd@gmail.com";
        $FromVariableName = "Royaltech Company Limited";
        
        // Get email from site settings or use fallback
        $SiteSettings = DB::table('_site_settings')->first();
        $toVariable = $SiteSettings->email_one ?? 'info@royaltech.co.ke';
        $toVariableName = "Royaltech Computers Limited";
        
        $errorMessage = null;
        $sentMessage = null;
        
        // Create sent message record before sending
        try {
            $sentMessage = SentMessage::create([
                'to_email' => $toVariable,
                'to_name' => $toVariableName,
                'from_email' => $FromVariable,
                'from_name' => $FromVariableName,
                'subject' => $subject,
                'message' => $Joiner,
                'message_type' => 'hire_request',
                'related_message_id' => $hireRequest ? $hireRequest->id : null,
                'sent_by' => Auth::check() ? Auth::id() : null,
                'email_sent' => false
            ]);
        } catch (\Exception $dbException) {
            \Log::warning('Failed to create sent_messages record: ' . $dbException->getMessage());
            // Continue even if sent_messages table doesn't exist
        }
        
        try {
            // Use site settings email or fallback
            $ccEmails = [];
            if (!empty($SiteSettings->email)) {
                $ccEmails[] = $SiteSettings->email;
            }
            // Add sales email if different from main email
            if (!empty($SiteSettings->email_one) && $SiteSettings->email_one !== 'sales@royaltech.co.ke') {
                $ccEmails[] = 'sales@royaltech.co.ke';
            }

            // Validate email addresses
            if (!filter_var($toVariable, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Invalid recipient email address: {$toVariable}");
            }

            Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName,$email,$ccEmails){
                $message->from($FromVariable , $FromVariableName);
                $message->to($toVariable, $toVariableName);
                
                // Add CC emails if they exist
                foreach ($ccEmails as $ccEmail) {
                    if (!empty($ccEmail) && filter_var($ccEmail, FILTER_VALIDATE_EMAIL)) {
                        $message->cc($ccEmail);
                    }
                }
                
                // Always CC albertmuhatia@gmail.com
                $message->cc('albertmuhatia@gmail.com');
                
                // Add BCC for backup (keeping for additional backup)
                $message->bcc('albertmuhatia@gmail.com');
                $message->replyTo($email);
                $message->subject($subject);
            });
            
            // Update sent message status
            if ($sentMessage) {
                $sentMessage->email_sent = true;
                $sentMessage->save();
            }
            
            \Log::info('Laptop Hire Email Sent Successfully', [
                'to' => $toVariable,
                'from' => $email,
                'name' => $name
            ]);
            
            return ['success' => true, 'error' => null];
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            
            // Update sent message status if record exists
            if ($sentMessage) {
                $sentMessage->email_sent = false;
                $sentMessage->email_error = $errorMessage;
                $sentMessage->save();
            }
            
            // Log the error with full details
            \Log::error('Laptop Hire Email Error: ' . $e->getMessage(), [
                'name' => $name,
                'email' => $email,
                'to' => $toVariable,
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Try sending to fallback email
            try {
                $fallbackEmail = 'albertmuhatia@gmail.com';
                
                // Create fallback sent message record
                try {
                    $fallbackSentMessage = SentMessage::create([
                        'to_email' => $fallbackEmail,
                        'to_name' => 'Royaltech Computers Limited',
                        'from_email' => $FromVariable,
                        'from_name' => $FromVariableName,
                        'subject' => $subject . ' [FALLBACK]',
                        'message' => $Joiner,
                        'message_type' => 'hire_request_fallback',
                        'related_message_id' => $hireRequest ? $hireRequest->id : null,
                        'sent_by' => Auth::check() ? Auth::id() : null,
                        'email_sent' => false
                    ]);
                } catch (\Exception $dbException) {
                    // Ignore if table doesn't exist
                }
                
                Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$fallbackEmail,$email){
                    $message->from($FromVariable , $FromVariableName);
                    $message->to($fallbackEmail, 'Royaltech Computers Limited');
                    $message->replyTo($email);
                    $message->subject($subject . ' [FALLBACK]');
                });
                
                // Update fallback sent message status
                if (isset($fallbackSentMessage)) {
                    $fallbackSentMessage->email_sent = true;
                    $fallbackSentMessage->save();
                }
                
                \Log::info('Laptop Hire Fallback Email Sent Successfully', [
                    'to' => $fallbackEmail,
                    'from' => $email
                ]);
                
                return ['success' => true, 'error' => 'Primary email failed, but fallback email sent'];
            } catch (\Exception $fallbackException) {
                $errorMessage = "Primary: {$e->getMessage()}; Fallback: {$fallbackException->getMessage()}";
                
                // Update fallback sent message status if it exists
                if (isset($fallbackSentMessage)) {
                    $fallbackSentMessage->email_sent = false;
                    $fallbackSentMessage->email_error = $fallbackException->getMessage();
                    $fallbackSentMessage->save();
                }
                
                \Log::error('Laptop Hire Fallback Email Also Failed: ' . $fallbackException->getMessage(), [
                    'primary_error' => $e->getMessage(),
                    'fallback_error' => $fallbackException->getMessage(),
                    'trace' => $fallbackException->getTraceAsString()
                ]);
            }
            
            return ['success' => false, 'error' => $errorMessage];
        }
    }

    public static function sendMessage($name,$email,$Joiner){
        $data = array(
            'content'=>$Joiner
        );
        $subject = "New Message";
        $FromVariable = "royaltechcomputersltd@gmail.com";
        $FromVariableName = "Royaltech Company Limited";
        
        // Get email from site settings or use fallback
        $SiteSettings = DB::table('_site_settings')->first();
        $toVariable = $SiteSettings->email_one ?? 'info@royaltech.co.ke';
        $toVariableName = "Royaltech Computers Limited";
        
        try {
            // Use site settings email or fallback
            $ccEmails = [];
            if (!empty($SiteSettings->email)) {
                $ccEmails[] = $SiteSettings->email;
            }
            // Add sales email if different from main email
            if (!empty($SiteSettings->email_one) && $SiteSettings->email_one !== 'sales@royaltech.co.ke') {
                $ccEmails[] = 'sales@royaltech.co.ke';
            }

            Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$toVariable,$toVariableName,$email,$ccEmails){
                $message->from($FromVariable , $FromVariableName);
                $message->to($toVariable, $toVariableName);
                
                // Add CC emails if they exist
                foreach ($ccEmails as $ccEmail) {
                    if (!empty($ccEmail) && filter_var($ccEmail, FILTER_VALIDATE_EMAIL)) {
                        $message->cc($ccEmail);
                    }
                }
                
                // Add BCC for backup
                $message->bcc('albertmuhatia@gmail.com');
                $message->replyTo($email);
                $message->subject($subject);
            });
            
            return true;
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Contact Message Email Error: ' . $e->getMessage(), [
                'name' => $name,
                'email' => $email,
                'to' => $toVariable,
                'error' => $e->getMessage()
            ]);
            
            // Try sending to fallback email
            try {
                $fallbackEmail = 'albertmuhatia@gmail.com';
                Mail::send('mailContact', $data, function($message) use ($subject,$FromVariable,$FromVariableName,$fallbackEmail,$email){
                    $message->from($FromVariable , $FromVariableName);
                    $message->to($fallbackEmail, 'Royaltech Computers Limited');
                    $message->replyTo($email);
                    $message->subject($subject . ' [FALLBACK]');
                });
            } catch (\Exception $fallbackException) {
                \Log::error('Contact Message Fallback Email Also Failed: ' . $fallbackException->getMessage());
            }
            
            return false;
        }
    }

}
