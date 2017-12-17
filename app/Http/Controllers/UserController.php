<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//sử dụng lệnh auth
use App\User;
use Hash;
class UserController extends Controller
{

     public function getRegister()
    {
        return view('register');
    }
    public function postRegister(Request $req)
    {
        $this->validate($req,
            [
                'full_name'=>'required|unique:users,full_name',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:5',
                'password2'=>'required|same:password',
                'phone'=>'min:10|max:11',
                'address'=>'required'
            ],
            [
                'full_name.required'=>'Vui lòng nhập vào tên',
                'full_name.unique'=>'Tên này đã tồn tại !',
                'email.required'=>'Vui lòng điền vào email !',
                'email.unique'=>'Email đã tồn tại !',
                'email.email'=>'email không đúng định dạng @email.com',
                'password.min'=>'mật khẩu chứa ít nhất 5 ký tự',
                'password.required'=>'Vui lòng điền vào mật khẩu !',
                'password2.required'=>'Nhập vào mật khẩu xác nhận',
                'password2.same'=>'Mật khẩu không trùng khớp',
                'phone.min'=>'Số điện thoại ít nhất 10 đến 11 số',
                'address.required'=>'Nhập vào địa chỉ liên hệ'

            ]   
            );
        $user = new User;
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->route('trangchu')->with('thongbao','Bạn đã đăng kí thành công !');

    }


    //controller đăng nhập cho người dùng
    public function getLogin()
    {
    	return view('login');
    }
    public function postLogin(Request $req)
    {
    	$this->validate($req,
    		[
    			'email'=>'required|email',
    			'password'=>'required|min:5'
    		],
    		[
    			'email.required'=>'Vui lòng điền vào email !',
    			'email.email'=>'email không đúng định dạng @email.com',
    			'password.min'=>'mật khẩu chứa ít nhất 5 ký tự',
    			'password.required'=>'Vui lòng điền vào mật khẩu !'
    		]	
    		);
        $dl = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($dl, $remember = true)) {
            //echo "login thành công !";
           // $user = Auth::user();
            return redirect()->route('trangchu');

        }
        else
        {
           return redirect()->back()->with('loi','Đăng nhập thất bại, vui lòng kiểm tra lại !');
        }
    }
    //controller đăng xuất cho ngươi dùng
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
