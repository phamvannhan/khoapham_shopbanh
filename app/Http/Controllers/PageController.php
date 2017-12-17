<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Products;
use App\ProductType;
//use App\Cart;
use Session;
use App\Customer;//sử dụng để lưu TT khách hàng
use App\Bill; 
use App\BillDetail;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all(); 
      

        //sản phẩm mới là new = 1
        $new_sanpham = Products::paginate(4);
         //dd($sanpham);
        //cach 1 return view('page.trangchu',['$slide'=>$slide]);
        $sp_khuyenmai = Products::where('promotion_price','<>',0)->paginate(8);
    	return view('page.trangchu',compact('slide','new_sanpham','sp_khuyenmai','loaisp'));
    }
    public function getLoaisp($type) //lấy id loại để truyền, id_type trên csdl
    {
        $sp_theoloai = Products::where('id_type',$type)->get();//sao cho id của loại = với id_type của sp
        //tìm sp khác có liên quan thì kq biến khác với id_type
        $sp_khac = Products::where('id_type','<>',$type)->paginate(6);
         $loaisp = ProductType::all();
         $loaisp_ten = ProductType::where('id',$type)->first();//first lấy ra tên đầu tiên cùng id
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loaisp','loaisp_ten'));
    }
     public function getChiTiet($id)//phải import Request mới
    {
        $sanpham = Products::where('id',$id)->first();//cách 2 biến $req của chitiet = với id của sp
        $sp_khac = Products::where('id_type','<>',$sanpham->id_type)->paginate(3);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_khac'));
    }
    public function getLienHe()
    {
        return view('page.lienhe');
    }
    public function getGioiThieu()
    {
        return view('page.gioithieu');
    }
    /*thêm giỏ hàng
    public function getThemGio(Request $req, $id)
    {
        
            //return view('page.themgiohang');
        
    } */
    //chức năng tìm kiếm trong tin
    public function getSearch(Request $req)
    {
        //lấy từ mà khách hàng tìm kiếm
        $tukhoa = $req->tukhoa;
        $product = Products::where('name','like',"%$tukhoa%")->orWhere('id_type','like',"%$tukhoa%")->orWhere('unit_price','like',"%$tukhoa%")->orWhere('promotion_price','like',"%$tukhoa%")->take(30)->paginate(8);
        return view('page.timkiem',compact('product'));
    }
    public function CheckOut()
    {
        
        return view('page.dathang');
    }
    
}
