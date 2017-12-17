@extends('master')

@section('content')
<br>
<!--dùng file jqueyry thêm chỉnh sửa phần số lượng-->
<div class="container">
    <div class="col-md-9 col-sm-9">
         <table class="table table-bordered table-responsive table-striped">  
    <tr>
        <th >ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quanty</th>
        <th>Action</th>
        <th>
            ToTal
        </th>
    </tr>
   
    @foreach($cartItems as $car)
         <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
            <td>     
                <img src="source/image/product/{{$car->options->img}}" width="100px" height="50px">
               
            </td>
            <td>{{number_format($car->price)}} VNĐ</td>
           
            <form action="cart/updateCart/{{$car->rowId}}"  method="PUT">
             <td class="cart_quantity" width="80px">
                
                                <input class="qty" id="upcart" type="number"  value="{{$car->qty}}" min="1" max="10" name="qty" size="3">
                              
                         
             </td>
            <td class="action">
              
                <a href="#" id="{{ $car->rowId}}"><span class="glyphicon glyphicon-refresh" style="color: blue;"></span></a>   
                <a href="cart/removeCart/{{$car->rowId}}" class="updatecart"><span class="glyphicon glyphicon-remove" style="color: red;"></span></a>        
             </td>
            </form>
            <td>
              {{$car->total()}}
            </td>
                
        </tr><!--end dong 1-->
        <tr>
            
        </tr>
        @endforeach  
    </table>
    </div><!--menu left sp mua-->
    <div class="col-md-3 col-sm-3">
        <h4 id="custom">Thông tin đơn hàng</h4>
        <div>
            <span>Tạm tính: {{Cart::subtotal()}} VND</span>
            
        </div>
        <div>
            <span>Tổng tiền (đã gồm VAT): {{Cart::subtotal()}} vnđ</span>
            <!--number_format($cartItems->subtotal-->
        </div>

    </div><!--menu right bill total-->
   
</div>
<br>
@endsection