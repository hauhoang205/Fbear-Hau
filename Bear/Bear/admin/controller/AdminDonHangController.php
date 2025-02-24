<?php
class AdminDonHangController
{
  public $modelDonHang;
  public function __construct()
  {
    $this->modelDonHang = new AdminDonHang();
  }
  public function danhSachDonHang()
  {

    $listDonHang = $this->modelDonHang->getAllDonHang();

    require_once './views/donhang/listDonHang.php';
  }

  public function detailDonHang()
  {
    $don_hang_id = $_GET['id_donhang'];

    //var_dump($don_hang_id);die;
    $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
//    var_dump($donHang);die;

    $sanPhamDonHang = $this->modelDonHang->getListDonHang($don_hang_id);
    // var_dump($sanPhamDonHang);die;
    require_once './views/donhang/detailDonHang.php';
  }

  
  public function formEditDonHang()
  {
    //Lấy thông tin danh mục cần sửa
    $id = $_GET['id_donhang'];
    $donHang = $this->modelDonHang->getDetailDonHang($id);
    
    // $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang()

    if ($donHang) {
      require_once './views/donhang/editDonHang.php';
    } else {
      header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
      exit();
    }
  }

  public function postEditDonHang()
  {
    //Kiểm tra dữ liệu đc submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $ten = $_POST['ten'];
      $dien_thoai = $_POST['dien_thoai'];
      $email = $_POST['email'];
      $dia_chi = $_POST['dia_chi'];
      $vanchuyen_thanhpho = $_POST['vanchuyen_thanhpho'];
      $trangthai = $_POST['trangthai'];
      $error = [];
      if (empty($ten)) {
        $error['ten'] = 'Tên danh mục không được để trống';
      }

      if (empty($dien_thoai)) {
        $error['dien_thoai'] = 'SDT không được để trống';
      }

      if (empty($email)) {
        $error['email'] =  'Email không được để trống';
      }
      if (empty($dia_chi)) {
        $error['dia_chi'] = 'Địa chỉ không được để trống';
      }
      if (empty($vanchuyen_thanhpho)) {
        $error['vanchuyen_thanhpho'] = 'Vận chuyển không được để trống';
      }
      if (empty($trangthai)) {
        $error['trangthai'] = 'Trạng thái đơn hàng';
      }

      if (empty($error)) {
        $this->modelDonHang->updateDonHang($id, $ten, $dien_thoai, $email, $dia_chi, $vanchuyen_thanhpho, $trangthai);
        header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
        exit();
      } else {
        header("Location: " . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_donhang=' . $id);
      }
    }
  }

  //   public function deleteSanPham(){
  //     $id = $_GET['id_sanpham'];
  //     $sanpham = $this->modelSanPham->getDetailSanPham($id);
  //     if($sanpham) {
  //       $this->modelSanPham->destroySanPham($id);
  //     }
  //     header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
  //     exit();
  //   }
}
