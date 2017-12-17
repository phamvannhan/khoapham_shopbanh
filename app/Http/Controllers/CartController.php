<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart; //phai them thu vien nay 
use Illuminate\Http\Request;
use App\Products;
use validator;

class CartController extends Controller
{
	
	public function viewCart()
    {
       // $cartTotalQuantity = Cart::getTotalQuantity();
        $cartItems = Cart::content();///dat bien
        //return view('page.Cart',compact('cartItems','cartTotalQuantity'));
         return view('page.Cart',compact('cartItems'));
    }
    public function addItem(  $id) //da xuat ra dc id
    {

    	$products = Products::find($id); //tim dung id de them tren csdl
    	Cart::add([
    					['id'=>$id,
    					'name'=>$products->name,
    					'qty'=>1,
    					'price'=>$products->unit_price,
    					'options'=>['img'=>$products->image]]
    			  ]);
   		$cartItems = Cart::content();///dat bien

    	return view('page.cart',compact('cartItems'));
    }
    public function updateCart(Request $request, $id)
    {
        /*chỉ update số lượng 
        
        Cart::update($id,['qty'=>$request->qty]);
        return back();
     // dd($request->qty)
     */
  
    }
    public function update(Request $request, $id)
    {
        /*chỉ update số lượng 
        
        Cart::update($id,['qty'=>$request->qty]);
        return back();
     // dd($request->qty)
     */
     $qty = $request->qty;
              $proId = $request->proId;
           $rowId = $request->rowId;
            Cart::update($rowId,$qty); // for update
            $cartItems = Cart::content(); // display all new data of cart
            return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');
    }

    public function removeItem($id)
    {
       // $cartItems = Cart::content();///dat bien
        Cart::remove($id);
        return redirect()->route('giohang');
        
    }
    
}
