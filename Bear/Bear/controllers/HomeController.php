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



}