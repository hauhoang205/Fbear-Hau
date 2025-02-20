<?php 
class SanPhamController {
    public $modelSanPham;
//     public $modelChiTietSp;
//     public $modelBinhLuan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        // $this->modelChiTietSp = new SanPham();
        // $this->modelBinhLuan = new BinhLuan();
    }

//     public function lichSuMuaHang(){
//         if(isset($_SESSION['user_client'])){
//             $userr = $_SESSION['user_client']['id'];
            
//             $nguoi_dung_id = $userr;
            
//             $arrTrangThaiDonHang = $this->modelSanPham->geTrangThaiDonHang();
//             $trangthai

//         }
//     }
    
   public function addGioHang(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
       $id_sanpham = $_POST['$id_sanpham'];
       $cosan_stock = $_POST['cosan_stock'];

       $user = $_SESSION['user_client']['id'];
       if(isset($user)){
        //lấy thông tin người dùng từ email
         $email = $this->modelSanPham->getNguoiDungFormEmail($user);
        // lấy thông tin giỏ hàng từ người dùng
         $gio_hang = $this->modelSanPham->getGioHangFormUser($email['id']);
         //Nếu giỏ hàng chưa tồn tại tạo mới
         if(!$gio_hang) {
             $gio_hangId = $this->modelSanPham->addGioHang($email['id']);
             $gio_hang = ['id' => $gio_hangId];
             $chi_tiet_gio_hang = [];

         }else {
            //Lấy chi tiết giỏ hàng
            $chi_tiet_gio_hang = $this->modelSanPham->getGioHangFormUser($gio_hang['id']);

         }
          //Kiểm tra tồn kho sản phẩm
         $san_pham = $this->modelSanPham->getSanPhamById($id_sanpham);
            if(!$san_pham || $san_pham['cosan_stock'] <= 0) {
                echo "Sản phẩm không tồn tại hoặc đã sử dụng";
                return;
            }

            $tong_so_luong = $cosan_stock;
            $checkSanPham = false;

            foreach($chi_tiet_gio_hang as $detail){
                if($detail['id_sanpham'] == $id_sanpham){
                    $tong_so_luong += $detail('cosan_stock');
                    $checkSanPham = true ;
                    break;
                }
            }

            if($tong_so_luong > $san_pham['cosan_stock']){
                echo "Ko đủ số lượng sản phẩm trong kho . Chỉ còn " . $san_pham['cosan_stock'] . "sản phẩm";
                return;
            }

            if($checkSanPham){
                $this->modelSanPham->updateSoLuong($gio_hang['id'], $id_sanpham , $tong_so_luong);

            }else{
                $this->modelSanPham->addDetailGioHang($gio_hang['id'], $id_sanpham , $cosan_stock);
            }
           
            header('Location: ' . BASE_URL . '?act=gio-hang' );

         
       }else{
        header('Location: ' . BASE_URL . '?act=form-dang-nhap-client' );
      }
    }
   }


    

}

?>