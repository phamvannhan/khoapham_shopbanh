
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a href="#"><i class="fa fa-user"> <span style="color: red; font-size: 18px;">Chào bạn {{Auth::user()->full_name}}</span></i></a></li>
						<li><a href="{{route('getLogout')}}">Đăng Xuất</a></li>
					@else

						<li><a href="{{route('getRegister')}}"{{route('getLogin')}}>Đăng kí</a></li>
						<li><a href="{{route('getLogin')}}">Đăng nhập</a></li>
					@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="GET" id="searchform" action="{{route('search')}}">
							
					        <input type="text" name="tukhoa" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						
					
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart">
								</i> Giỏ hàng ({{Cart::count()}})<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							
								<div class="cart-item">

									<div class="media">
										<a class="pull-left" href="#"><img src="#" alt=""></a>
										<a href="#" class="cart-item-delete"><i class="fa fa-times"></i></a>
										<div class="media-body">
											<span class="cart-item-title"></span>
											<span class="cart-item-amount">sluong*<span>
											giasp
										</div>
									</div>
								</div>
							
								<!--end cart item-->
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">143.000 VNĐ</span></div>
									<div class="clearfix"></div>
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('giohang')}}" class="beta-btn primary text-center">Xem giỏ <i class="fa fa-chevron-right"></i></a>
									</div>
									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a >Sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
							</ul>
						</li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="contacts.html">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->