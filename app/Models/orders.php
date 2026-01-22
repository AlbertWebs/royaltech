<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;
use App\Models\Product;

class orders extends Model
{
    use HasFactory;
    protected $fillable=['total', 'status'];
    public function orderFields(){

        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');

    }

    public static function createOrder(){

        $user = Auth::user();
        $order = $user->orders()->create(['total'=>\Cart::getTotal(),'status'=>'pending']);

        $cartItems = \Cart::getContent();
        foreach($cartItems as $cartItem)

            $order->orderFields()->attach($cartItem->id,['qty'=>$cartItem->quantity, 'tax' =>0, 'total'=>\Cart::getTotal()]);
            //Insert Notification
            $Notifications = new Notifications;
            $Notifications->type = 'Order';
            $Notifications->content = 'You have a new Order';
            $Notifications->save();



       }
}
