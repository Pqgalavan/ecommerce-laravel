<?php



namespace App\Http\Controllers;

use App\Models\cart as ModelsCart;
use App\Models\catogeries;
use App\Models\order;
use App\Models\productmodel;
use App\Models\shipping;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request ;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class cart extends BaseController {


    public function addcart( $id){
    if (Auth::check()) {

        $userId = Auth::id();

       $oldcart = ModelsCart::where('user_id', $userId) // First where clause
    ->where('product_id', $id) // Second where clause
    ->first();

        if($oldcart){
            return redirect('/')->with('status',"The Product is Already In cart");


        }else{
               $cart = new ModelsCart();
            $cart->user_id = $userId;
            $cart->product_id = $id;
            $cart->qty = '1';
            $cart->total_amount ='0';
     $cart->save();

             return redirect('/')->with('status',"Cart Added Sucessfully");


        }


    } else {
return redirect('/login')->with('status','Login Please');
    }

}

public function cart_item(){

    if(Auth::check()){
$userid = Auth::id();

$cart = ModelsCart::where('user_id', $userid)->get();

return view('user.cart',compact('cart'));

    }

}


public function checkout(){

if(Auth::check()){
    $userid = Auth::id();
    $cart = ModelsCart::where('user_id', $userid)->get();

}


}

public function qty_update(Request $req){

    if(Auth::check()){
        $userid = Auth::id();
        $cart = ModelsCart::where('user_id', $userid)
               ->where('product_id',$req->productid )->first();
               if($cart){

                $cart->qty = $req->qty;
                $cart->save();

               }


    }

}

public function totalqty_update(Request $req){
    if(Auth::check()){
        $userid = Auth::id();
        $cart = ModelsCart::where('user_id', $userid) ->update(['total_amount' => $req->total_amount]);



    }


}


public function checkoutfinal(){
    if(Auth::check()){
        $userid = Auth::id();
        $cart = ModelsCart::where('user_id', $userid)->get();
// return $cart;
               return view('user.order',compact('cart'));

    }


}



public function placeorder( Request $req){

    if(Auth::check()){
        $userid = Auth::id();
        $rand_int = mt_rand();

   $shipping = new shipping();

   $shipping->name= $req->name;
   $shipping->address= $req->address;
   $shipping->city= $req->city;
   $shipping->state= $req->state;
   $shipping->zip_code= $req->zip_code;
   $shipping->phone_number= $req->phone_number;
   $shipping->email= $req->email_address;
   $shipping->order_id= $rand_int;
   $shipping->user_id= $userid;
   $shipping->save();
   $cart = ModelsCart::where('user_id', $userid)->get();
   if($cart){

     foreach($cart as $product){
     $orderss = new order();
     $orderss->product_id = $product->product_id;
     $orderss->qty= $product->qty;
     $orderss->amount = $product->amount;
     $orderss->total_amount = $product->total_amount;
     $orderss->order_id = $rand_int;
     $orderss->save();
    $product->delete();

               }



            }


    }

return redirect('/')->with('status','Order Was Placed Sucessfully');



}



public function myorders(){

if(Auth::check()){

    $id = Auth::id();


    $myorder = shipping::where('user_id',$id)->get();
    return $myorder;


}


}
};





?>
