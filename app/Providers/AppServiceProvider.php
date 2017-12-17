<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart; //mua giỏ hàng
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {

        //chia sẻ dulieu = gán biến $view trên header
        view()->composer('header',function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp',$loai_sp);
        });
        
       
     
        /*dat hàng thêm vào giỏ su dung chua dc
        view()->composer('page.dathang',function($view){
            if(Session::has('cart')){
                $oldCart = Session::get('cart'); //Ktra trong giỏ củ có chưa
                $cart = new Cart($oldCart);//thêm mới vào giỏ cũ
                //đặt product_cart là tên sp đã chọn vào giỏ hàng, gán thêm với items
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
            
        }); 
        */
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
