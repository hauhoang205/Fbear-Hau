<?php
 class AdminDanhMucController {
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc(){
        
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postDanhMuc(){
        //Kiểm tra dữ liệu đc submit
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $ten = $_POST['ten'];
             $mieuta = $_POST['mieuta'];
             $ngay_capnhat = $_POST['ngay_capnhat'];

             $error = [];
              if(empty($ten)){
                $error['ten'] = 'Tên danh mục không được để trống';
              }
              
              if(empty($error)){
                 $this->modelDanhMuc->insertDanhMuc($ten,$mieuta,$ngay_capnhat);
                 header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                 exit();
              }else{
                require_once './views/danhmuc/addDanhMuc.php';
              }
        }

    }

    public function formEditDanhMuc(){
        //Lấy thông tin danh mục cần sửa
        $id = $_GET['id_danhmuc'];
        $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhmuc) {
          require_once './views/danhmuc/editDanhMuc.php';
        }else {
          header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
          exit();
        }
  }

  
  public function postEditDanhMuc(){
      //Kiểm tra dữ liệu đc submit
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $id = $_POST['id'];
           $ten = $_POST['ten'];
           $mieuta = $_POST['mieuta'];
           $ngay_capnhat = $_POST['ngay_capnhat'];

           $error = [];
            if(empty($ten)){
              $error['ten'] = 'Tên danh mục không được để trống';
            }
            
            if(empty($error)){
               $this->modelDanhMuc->updateDanhMuc($id,$ten,$mieuta,$ngay_capnhat);
               header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
               exit();
            }else{
              $danhmuc = ['id' => $id, 'ten' => $ten, 'mieuta' => $mieuta, 'ngay_capnhat' => $ngay_capnhat];
              require_once './views/danhmuc/editDanhMuc.php';
            }
      }

  }

  public function deleteDanhMuc(){
    $id = $_GET['id_danhmuc'];
    $danhmuc = $this->modelDanhMuc->getDetailDanhMuc($id);
    if($danhmuc) {
      $this->modelDanhMuc->destroyDanhMuc($id);
    }
    header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
    exit();
  }
 }

?>