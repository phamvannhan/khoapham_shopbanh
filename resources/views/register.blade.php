@extends('master')

@section('content')
	<div class="container">

		<div class=" row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title" style="font-weight: bold; padding-top: 10px;">Thông Tin Đăng kí</h3>
				  </div>
				  <div class="panel-body">
				   @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                    @if(session('loi'))
                        <div class="alert alert-danger">
                            {{session('loi')}}
                        </div>
                    @endif
				   	<form action="{{route('postRegister')}}" method="POST">
						 {{ csrf_field() }}
						 <!--div group-->
						 <div class="form-group">
						 @if($errors->has('full_name'))
                                         <div class="alert-danger">
                                             {{$errors->first('full_name')}}
                                         </div>
                                     @endif
						<label >Nhập username:</label>
						<input type="text" name="full_name" class="form-control" placeholder="Vui lòng nhập tên ..." value="{{ old('full_name') }}">
						</div>
						 <!--end div group-->
						<div class="form-group">
						 @if($errors->has('email'))
                                         <div class="alert-danger">
                                             {{$errors->first('email')}}
                                         </div>
                                     @endif
						<label >Nhập vào email:</label>
						<input type="email" name="email" class="form-control" placeholder="Vui lòng nhập email..." value="{{ old('email') }}">
						</div>
						<div class="form-group">
							 @if($errors->has('password'))
                                         <div class="alert-danger">
                                             {{$errors->first('password')}}
                                         </div>
                                     @endif
							<label >Mật khẩu:</label>
							<input type="password" name="password" class="form-control" placeholder="Vui lòng nhập pass..." value="{{ old('password') }}">
						</div>
						<div class="form-group">
							 @if($errors->has('password2'))
                                         <div class="alert-danger">
                                             {{$errors->first('password2')}}
                                         </div>
                                     @endif
							<label >Xác nhận mật khẩu:</label>
							<input type="password" name="password2" class="form-control" placeholder="xác nhận mật khẩu nhập..." value="{{ old('password2') }}">
						</div>
						<div class="form-group">
							 @if($errors->has('phone'))
                                         <div class="alert-danger">
                                             {{$errors->first('phone')}}
                                         </div>
                                     @endif
							<label >Số điện thoại:</label>
							<input type="text" name="phone" class="form-control" placeholder="Nhập vào số điện thoại liên lạc ..." value="{{ old('phone') }}">
						</div>
						<div class="form-group">
							 @if($errors->has('address'))
                                         <div class="alert-danger">
                                             {{$errors->first('address')}}
                                         </div>
                                     @endif
							<label >Nhập vào địa chỉ liên hệ:</label>
							<textarea name="address" rows="2" class="form-control" >{{ old('address') }}</textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Register" class="btn-info btnlogin btn-lg">
						</div>
						</form>
				  </div>
			</div>
		</div>
			
		</div><!--end div wwrapform-->
	</div>
	<div class="clearfix"></div>
@endsection