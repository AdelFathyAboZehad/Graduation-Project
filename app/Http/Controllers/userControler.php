<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;
use App\User;
use App\session;
class userControler extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
       
    }
    public function showProducts()
    {
        $this->getFromSession();
        $showProducts=product::all();
        return view('user.home',compact('showProducts'));
    }
    public function AddToCart($id){
    
        $prod=product::find($id);
        if(!$prod) {
            return "not found";
        }
        $prod->quantity-=1;
        $prod->save();
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "num" => 1,
                        "name" => $prod->name,
                        "price" => $prod->price,
                        "image" => $prod->image ,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect('user/session/save_DB');
        }
        // if cart not empty then check if this product exist then increment num
        if(isset($cart[$id])) {
            $cart[$id]['num']++;
            session()->put('cart', $cart);
            return redirect('user/session/save_DB');
        }
       // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $prod->name,
            "num" => 1,
            "price" => $prod->price,
            "image" => $prod->image
        ];
        session()->put('cart', $cart);
        return redirect('user/session/save_DB');
    }
       public function history(){
       
        $yourProducts = session()->get('cart');
        if(!$yourProducts){
            return"Empty";
            
        }
        else{
          
        return  view('user.history',compact('yourProducts'));//'prods',
        }
    }

public function saveToTableSession(){
   
    session::truncate();
    $MyCarts = session()->get('cart');
    if(count($MyCarts)>0){
        foreach ($MyCarts as $key=>$MyCart){
            $getProductFromSesssion=session::find($key);
            if(!$getProductFromSesssion){
                $AddToSeeeion=new session;//table
                $AddToSeeeion->key=$key;
                $AddToSeeeion->name=$MyCart['name'];
                $AddToSeeeion->num=$MyCart['num'];
                $AddToSeeeion->image=$MyCart['image'];
                $AddToSeeeion->save();
            }
            elseif(isset($getProductFromSesssion)){
                $getProductFromSesssion->delete();
                $AddToSeeeion=new session;
                $AddToSeeeion->key=$key;
                $AddToSeeeion->name=$MyCart['name'];
                $AddToSeeeion->num=$MyCart['num'];
                $AddToSeeeion->image=$MyCart['image'];
                $AddToSeeeion->save();
            }
        }
        return redirect('user/home');
    }
}
public function getFromSession(){
   
    $datas=session::all();
    $cart = session()->get('cart');
    if(count($datas)>0){
        foreach ($datas as $data){
            if(!$cart) {
                $cart = [
                    $data->key => [
                            "num" => $data->num,
                            "name" => $data->name,
                            "price" => $data->price,
                            "image" => $data->image ,
                        ]
                ];
                session()->put('cart', $cart);
            }
        else{
            $cart[$data->key] = [
                "name" => $data->name,
                "num" => $data->num,
                "price" => $data->price,
                "image" => $data->image
            ];
            session()->put('cart', $cart);
        }
        
        }
        return redirect('user/home');
    }
}
}

