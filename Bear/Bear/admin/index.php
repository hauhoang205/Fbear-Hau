<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once './controller/AdminDanhMucController.php';
require_once './controller/AdminSanphamController.php';
require_once './controller/AdminDonHangController.php';
require_once './controller/AdminBaoCaoThongKeController.php';
require_once './controller/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);die();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {

  //route home
  '/' => (new AdminBaoCaoThongKeController())->home(),

//route danh mục
  'danh-muc' =>(new AdminDanhMucController())->danhSachDanhMuc(),
  'form-them-danh-muc' =>(new AdminDanhMucController())->formAddDanhMuc(),
  'them-danh-muc' =>(new AdminDanhMucController())->postDanhMuc(),
  'form-sua-danh-muc' =>(new AdminDanhMucController())->formEditDanhMuc(),
  'sua-danh-muc' =>(new AdminDanhMucController())->postEditDanhMuc(),
  'xoa-danh-muc' =>(new AdminDanhMucController())->deleteDanhMuc(),


  //route sản phẩm 
  'san-pham' =>(new AdminSanPhamController())->danhSachSanPham(),
  'form-them-san-pham' =>(new AdminSanPhamController())->formAddSanPham(),
  'them-san-pham' =>(new AdminSanPhamController())->postSanPham(),
  'form-sua-san-pham' =>(new AdminSanPhamController())->formEditSanPham(),
  'sua-san-pham' =>(new AdminSanPhamController())->postEditSanPham(),
  'xoa-san-pham' =>(new AdminSanPhamController())->deleteSanPham(),

  'don-hang' =>(new AdminDonHangController())->danhSachDonHang(),
  'form-sua-don-hang' =>(new AdminDonHangController())->formEditDonHang(),
  'sua-don-hang' =>(new AdminDonHangController())->postEditDonHang(),
  'chi-tiet-don-hang' =>(new AdminDonHangController())->detailDonHang(),


  //route quản lý tài khoản 
     //quản trị
     'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->danhSachQuanTri(),
     'form-them-quan-tri' =>(new AdminTaiKhoanController())->formAddQuanTri(),
     'them-quan-tri' =>(new AdminTaiKhoanController())->postQuanTri(),
     'form-sua-quan-tri' =>(new AdminTaiKhoanController())->formEditQuanTri(),
     'sua-quan-tri' =>(new AdminTaiKhoanController())->postEditQuanTri(),
     'reset-password' =>(new AdminTaiKhoanController())->resetPassword(),

      //khách hàng
     'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->danhSachKhachHang(),
     'form-sua-khach-hang' =>(new AdminTaiKhoanController())->formEditKhachHang(),
     'sua-khach-hang' =>(new AdminTaiKhoanController())->postEditKhachHang(),
     'chi-tiet-khach-hang' =>(new AdminTaiKhoanController())->detailKhachHang(),

     //route auth
     'login-admin' => (new AdminTaiKhoanController())->formLogin(),
      'check-login-admin' => (new AdminTaiKhoanController())->login(),
      'logout-admin' => (new AdminTaiKhoanController())->logout(),
};
