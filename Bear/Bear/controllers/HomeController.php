<?php 

class HomeController
{
  public $modelSanPham;
  public $modelDanhMuc;

  public function __construct()
  {
   $this->modelSanPham = new SanPham();
   $this->modelDanhMuc = new DanhMuc();
  }

 public function home(){
   $listSanPham = $this->modelSanPham->getAllSanPham();
   $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

    require_once './views/home.php';
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
   require_once 'views/gioHang.php';
 }

//  public function addGioHang(){
//     if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
//       $san_pham_id = $_POST['id'];
//       $so_luong=$_POST['cosan_stock'];

//       if(!gio)
//  }
}