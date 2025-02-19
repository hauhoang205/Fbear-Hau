<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/spBanChayController.php';
require_once './controllers/DichVuController.php';
require_once './controllers/dangNhapClientController.php';
// Require toàn bộ file Models
require_once './models/Student.php';
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/dangNhapClient.php';
// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);die();

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
//route
    '/' => (new HomeController())->home(),
    'san-pham' => (new HomeController())->show(),
    //Chi tiết sản phẩm
    'chi-tiet-sp' => (new HomeController())->chitietSP(),

    // 'them-gio-hang' => (new  HomeController())->addGioHang(),
    
    'form-khuyen-mai' => (new spBanChayController())->formKhuyenMai(),
    'gioi-thieu' => (new GioiThieuController())->gioiThieu(),


    //đăng nhập và đăng ký
    'form-dang-ki-client' => (new dangNhapClientController())->formdangki(),
    'check-dang-ki-client' => (new dangNhapClientController())->dangki(),
    'form-dang-nhap-client' => (new dangNhapClientController())->formdangnhap(),
    // 'check-dang-nhap-client' => (new dangNhapClientController())->dangnhap(),
    // 'log-out-client' => (new dangNhapClientController())->logoutclient(),

};