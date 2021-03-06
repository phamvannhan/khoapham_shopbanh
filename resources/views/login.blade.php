@extends('master')
@section('content')
	<div class="container">
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Thông Tin Đăng Nhập</h3>
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
				   	<form action="{{route('postLogin')}}" method="POST">
						 {{ csrf_field() }}
						<div class="form-group">
						 @if($errors->has('email'))
                                         <div class="alert-danger">
                                             {{$errors->first('email')}}
                                         </div>
                                     @endif
						<label >Nhập vào email:</label>
						<input type="email" name="email" class="form-control" placeholder="Vui lòng nhập email...">
						</div>
						<div class="form-group">
							 @if($errors->has('password'))
                                         <div class="alert-danger">
                                             {{$errors->first('password')}}
                                         </div>
                                     @endif
							<label >Mật khẩu:</label>
							<input type="password" name="password" class="form-control" placeholder="Vui lòng nhập pass...">
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn-success btnlogin btn-lg">
						</div>
						</form>
				  </div>
			</div>
		</div>
		</div><!--end row-->
	</div>
@endsection