<?php 
class SanPhamController {
    public $modelSanPham;
//     public $modelChiTietSp;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        // $this->modelChiTietSp = new SanPham();
    }
 
 public function show() {
    $id = $_GET['id_danhmuc'];
    $listSanPham = $this->modelSanPham->chitiet($id);
 
    require "views/sanphamDM.php";
  }
 
  public function chitietSP(){
    $id = $_GET['id_sanpham'];
    $sp = $this->modelSanPham->selectChiTietSp($id);
    
    require_once 'views/chitietSP.php';
  }
 
  public function formGioHang(){
    require_once 'views/layout/giohang.php';
  }

  public function addGioHang()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id_san_pham = $_POST['id_san_pham'];
        $so_luong = $_POST['so_luong'];

        $user = $_SESSION['user_client']['id'];
        if (isset($user)) {
            // Lấy thông tin người dùng từ email
            $mail = $this->modelSanPham->getNguoiDungFromEmail($user);

            // Lấy thông tin giỏ hàng của người dùng
            $gio_hang = $this->modelSanPham->getGioHangFromUser($mail['id']);

            // Nếu giỏ hàng chưa tồn tại, tạo mới
            if (!$gio_hang) {
                $gio_hangId = $this->modelSanPham->addGioHang($mail['id']);
                $gio_hang = ['id' => $gio_hangId];
                $chi_tiet_gio_hang = [];
            } else {
                // Lấy chi tiết giỏ hàng
                $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
            }

            // Kiểm tra sản phẩm có tồn tại không
            $san_pham = $this->modelSanPham->getSanPhamById($id_san_pham);
            if (!$san_pham) {
                echo "Sản phẩm không tồn tại.";
                return;
            }

            $tong_so_luong = $so_luong; // Tổng số lượng muốn thêm vào giỏ hàng
            $checkSanPham = false;

            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
            foreach ($chi_tiet_gio_hang as $detail) {
                if ($detail['id_san_pham'] == $id_san_pham) {
                    $tong_so_luong += $detail['so_luong']; // Cộng số lượng đã có trong giỏ hàng
                    $checkSanPham = true;
                    break;
                }
            }

            // Thêm hoặc cập nhật sản phẩm trong giỏ hàng
            if ($checkSanPham) {
                $this->modelSanPham->updateSoLuong($gio_hang['id'], $id_san_pham, $tong_so_luong);
            } else {
                $this->modelSanPham->addDetailGioHang($gio_hang['id'], $id_san_pham, $so_luong);
            }

            // Chuyển hướng đến giỏ hàng
            header('Location: ?act=gio-hang');
        } else {
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            header("Location: ?act=form-dang-nhap-client");
        }
    }
}

  

 public function gioHang()
 {

     $user = $_SESSION['user_client']['id'];
     if (isset($user)) {
         $mail = $this->modelSanPham->getNguoiDungFromEmail($user);
         // var_dump($mail["id"]);die;

         $gio_hang = $this->modelSanPham->getGioHangFromUser($mail['id']);
         if (!$gio_hang) {
             $gio_hangId = $this->modelSanPham->addGioHang($mail['id']);
             $gio_hang = ['id' => $gio_hangId];
             $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
         } else {
             $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);

         }
         $idsoLuong = [];
         foreach ($chi_tiet_gio_hang as $giohang) {
             $idsoLuong[] = $giohang['id_san_pham'];

         }
        //  $soluong = $this->modelSanPham->getSoLuongNhieuSanPham($idsoLuong);

         // var_dump($chi_tiet_gio_hang);die;
         // $max = $this->modelSanPham->maxsoluong();
         require_once './views/layout/giohang.php';

     } else {
         header("Location: ?act=form-dang-nhap-client");

     }
 }
    
 public function xoaGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['chi_tiet_id'];
            // var_dump($id);die;
            $this->modelSanPham->xoa($id);
            header("Location: ?act=gio-hang");
        }

    }
    public function thanhToan(){
       
     $userr = $_SESSION['user_client']['id'];
     if(isset($userr)){
        $user = $this->modelSanPham->getNguoiDungFromEmail($userr);

        $gio_hang = $this->modelSanPham->getGioHangFromUser($user['id']);
        if(!$gio_hang){
            $gio_hangId = $this->modelSanPham->addGioHang($user['id']);
            $gio_hang = ['id' =>$gio_hangId];
            $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);

        }else {
            $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
        }

        require_once './views/thanhToan.php';
     }else {
        header("Location: ?act=form-dang-nhap-client");
     }
          
    }

    public function xuLiThanhToan(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ten = $_POST['ten'];
             $email = $_POST['email'];
             $dien_thoai = $_POST['dien_thoai'];
             $dia_chi = $_POST['dia_chi'];
             $vanchuyen_thanhpho = $_POST['vanchuyen_thanhpho'];
             $tong_gia = $_POST['tong_gia'];
             $phuongthuc_thanhtoan = $_POST['phuongthuc_thanhtoan'];

             $trangthai_thanhtoan = 'Chưa thanh toán';
             $trangthai = 'xử lý';
             $ngay_capnhat = date('Y-m-d H:i:s'); 
             $phien_token = 'PH' . rand(1000, 9999);
 
            $userr = $_SESSION['user_client']['id'];
    
            $id_KH = $userr;

           $donHang = $this->modelSanPham->addThanhToan(
            $id_KH,
             $ten,
             $email,
             $dien_thoai,
             $dia_chi,
             $vanchuyen_thanhpho,
             $tong_gia,
             $phuongthuc_thanhtoan,
             $trangthai_thanhtoan,
             $trangthai,
             $ngay_capnhat,
             $phien_token,
           );

           $gio_hang = $this->modelSanPham->getGioHangFromUser($id_KH);
           if($gio_hang){
            $chi_tiet_gio_hang = $this->modelSanPham->getDetailGioHang($gio_hang['id']);
            
            foreach($chi_tiet_gio_hang as $item){
                // var_dump($item); die;
                $donGia = $item['gia_coso'];

                $test = $this->modelSanPham->addChitietDonHang(
                    $donHang,
                    $item['id_san_pham'],
                    $donGia,
                    $item['so_luong'],
                    $donGia * $item['so_luong']
                );
                // var_dump($test); die;
            }
                 // Xóa chi tiết giỏ hàng thông qua id_gio_hang
             $this->modelSanPham->clearDetailGioHang($gio_hang['id']);
            //xóa giỏ hàng thông qua id người dùng
            $this->modelSanPham->clearGioHang($id_KH);


            $_SESSION['flash_message'] = "✅ Đặt hàng thành công! ";
                foreach ($chi_tiet_gio_hang as $item) {
                    //Xử lí khi thanh toán số lượng ở sản phẩm sẽ trừ đi
                    $this->modelSanPham->thanhCong($item['id_san_pham'], $item['so_luong']);
                }
                header('Location: ?act=lich-su-mua-hang');

            } else {
                var_dump("loi dat hang ");
                die;
            }

        }
    }

    public function lichSuMuaHang(){
        if(isset($_SESSION['user_client'])){
            $userr = $_SESSION['user_client']['id'];

            $id_KH = $userr;

            $arrTrangThaiDonHang = $this->modelSanPham->getTrangThaiDonHang();

            $arrPhuongThucThanhToan = $this->modelSanPham->getPhuongThucThanhToan();

            $donHang = $this->modelSanPham->getDonHangFromUser($id_KH);

 
            require_once './views/qldonhang.php';
        }else{
            var_dump('Ban chua dang nhap'); die;
        }
    }

    public function chiTietMuaHang(){
        if(isset($_SESSION['user_client'])){
            $userr = $_SESSION['user_client']['id'];

            $id_KH = $userr;
            $donHangId = $_GET['id'];

            $arrTrangThaiDonHang = $this->modelSanPham->getTrangThaiDonHang();

            $arrPhuongThucThanhToan = $this->modelSanPham->getPhuongThucThanhToan();
            //Lấy đơn hàng theo ID
            $donHang = $this->modelSanPham->getDonHangById($donHangId);
            //Lấy thông tin sp đơn hàng
            $chiTietDonHang = $this->modelSanPham->getChiTietDonHangById($donHangId);

            require_once './views/chitietmuahang.php';
        }else{
            var_dump('Ban chua dang nhap'); die;
        }
    }
    public function huyDonHang(){
        if(isset($_SESSION['user_client'])){
        //   $userr = $_SESSION['user_client']['id'];
        //   $nguoi_dung_id = $userr;
        
        //id lấy ở đường dẫn
          $donHangId = $_GET['id'];
        
          //Lấy thông tin đơn hàng từ ID
        $donHang = $this->modelSanPham->getDonHangById($donHangId);
        // var_dump($donHang);die;

        //Kiểm tra trạng thái đơn hàng
        if($donHang['trangthai'] != 'xử lý'){
            echo "Trạng thái đơn hàng của bạn đã thay đổi";
            exit();
        }

        //Cập nhật trạng thái đơn hàng đã hủy
        $this->modelSanPham->updateTrangThaiDonHang($donHangId, 'đã hủy');
          
        //Lấy danh sách sản phẩm đơn hàng khi đã hủy vẫn xem đc chi tiết
        $this->modelSanPham->getChiTietDonHang($donHangId);

        header('Location: ?act=lich-su-mua-hang');
        exit();
        }else{
            echo 'Bạn chưa đăng nhập';
            exit();
        }
    }
}

?>