<?php
 class AdminSanPhamController {
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();

    }
    public function danhSachSanPham(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

     
    public function formAddSanPham(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
    }

    public function postSanPham(){
        //Kiểm tra dữ liệu đc submit
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $ten = $_POST['ten'];
             $mota = $_POST['mota'];
             $id_danhmuc = $_POST['id_danhmuc'];
             $gia_coso = $_POST['gia_coso'];
             $cosan_stock = $_POST['cosan_stock'];
             $ma_hang = $_POST['ma_hang'];
             $trang_thai = $_POST['trang_thai'];
             $hinhanh = $_FILES['hinhanh'];
             $ngay_capnhat = $_POST['ngay_capnhat'];

             $file_thumb = upLoadFile($hinhanh, './uploads/');
             $error = [];
              if(empty($ten)){
                $error['ten'] = 'Tên sản phẩm không được để trống';
              }

              if(empty($id_danhmuc)){
                $error['id_danhmuc'] = 'Tên sản phẩm không được để trống';
              }
              if(empty($gia_coso)){
                $error['gia_coso'] = 'Tên sản phẩm không được để trống';
              }
              if(empty($cosan_stock)){
                $error['cosan_stock'] = 'Tên sản phẩm không được để trống';
              }
              if(empty($ma_hang)){
                $error['ma_hang'] = 'Tên sản phẩm không được để trống';
              }
              if(empty($trang_thai)){
                $error['trang_thai'] = 'Tên sản phẩm không được để trống';
              }
              if(empty($hinhanh)){
                $error['hinhanh'] = 'Tên sản phẩm không được để trống';
              }
              if(empty($ngay_capnhat)){
                $error['ngay_capnhat'] = 'Tên sản phẩm không được để trống';
              }
              
              if(empty($error)){
                 $this->modelSanPham->insertSanPham($ten,$mota,$id_danhmuc,$gia_coso,$cosan_stock,$ma_hang,$trang_thai,$ngay_capnhat,$file_thumb);
                 header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                 exit();
              }else{
                require_once './views/sanpham/addSanPham.php';
              }
        }

    }

    public function formEditSanPham(){
        //Lấy thông tin danh mục cần sửa
        $id = $_GET['id_sanpham'];
        $sanpham = $this->modelSanPham->getDetailSanPham($id);
        if($sanpham) {
          require_once './views/sanpham/editSanPham.php';
        }else {
          header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
          exit();
        }
  }

  public function postEditSanPham(){
      //Kiểm tra dữ liệu đc submit
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $id = $_POST['id'];
           $ten = $_POST['ten'];
           $mota = $_POST['mota'];
           $id_danhmuc = $_POST['id_danhmuc'];
           $gia_coso = $_POST['gia_coso'];
           $cosan_stock = $_POST['cosan_stock'];
           $ma_hang = $_POST['ma_hang'];
           $trang_thai = $_POST['trang_thai'];
           $hinhanh = $_POST['hinhanh'];
           $ngay_capnhat = $_POST['ngay_capnhat'];

           $error = [];
            if(empty($ten)){
              $error['ten'] = 'Tên danh mục không được để trống';
            }
            
            if(empty($error)){
               $this->modelSanPham->updateSanPham($id,$ten,$mota,$id_danhmuc,$gia_coso,$cosan_stock,$ma_hang,$trang_thai,$hinhanh,$ngay_capnhat);
               header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
               exit();
            }else{
              $sanpham = ['id' => $id, 'ten' => $ten, 'mota' => $mota,'id_danhmuc' => $id_danhmuc,'gia_coso' => $gia_coso,'cosan_stock' => $cosan_stock,'ma_hang' => $ma_hang,'trang_thai' => $trang_thai,'hinhanh' => $hinhanh ,'ngay_capnhat' => $ngay_capnhat ];
              require_once './views/sanpham/editSanPham.php';
            }
      }

  }

  public function deleteSanPham(){
    $id = $_GET['id_sanpham'];
    $sanpham = $this->modelSanPham->getDetailSanPham($id);
    if($sanpham) {
      $this->modelSanPham->destroySanPham($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
    exit();
  }
  }

?>