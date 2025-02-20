<?php 
class SanPham {
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function getAllSanPham(){
    try{
         $sql = 'SELECT product.*, category.ten
         FROM product
         INNER JOIN category ON product.id_danhmuc = category.id';

         $stmt = $this->conn->prepare($sql);

         $stmt->execute();

         return $stmt->fetchAll();
         
    }catch(Exception $e){
          echo "Error" . $e->getMessage();
    }
  }

  public function chitiet($id){
    try{
      $sql = 'SELECT product.*, category.ten
      FROM product
      INNER JOIN category ON product.id_danhmuc = category.id
      WHERE product.id_danhmuc = :id_danhmuc 
      
      ';
      $stmt = $this->conn->prepare($sql);
      $stmt -> bindParam(':id_danhmuc', $id, PDO::PARAM_INT);

      $stmt->execute();

      return $stmt->fetchAll();
      
 }catch(Exception $e){
       echo "Error" . $e->getMessage();
 }
  }

  public function selectChiTietSp($id){
    try{
       $sql = 'SELECT * FROM product WHERE  id = :id';
       $stmt = $this->conn->prepare($sql);
       $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }catch (Exception $e){
       echo "Lỗi" . $e->getMessage();
    }
  }

  public function getNguoiDungFormEmail($user){
     try{
         $sql = 'SELECT * FROM user WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id', $user);
         $stmt->execute();

         return $stmt->fetch();
     }catch(Exception $e){
       echo 'Loi: ' . $e->getMessage();
     }
  }

  public function getGioHangFormUser($id){
    try{
         $sql = 'SELECT * FROM cart WHERE id_KH = :id_KH';
         
         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id_KH' , $id);
         $stmt->execute();
         
         return $stmt->fetch();
    }catch(Exception $e){
      echo 'Loi: ' . $e->getMessage();
    }
  }

  public function addGioHang($id){
      try{
            $sql = 'SELECT * FROM cart (id_KH) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id' , $id);
            $stmt->execute();
            
            return $this->conn->lastInsertId();
      }catch(Exception $e){
        echo 'Loi: ' .$e->getMessage();
      }
  }

  public function getSanPhamById($id_sanpham){
    try {
       $sql = 'SELECT * FROM product WHERE id = :id';

       $stmt = $this->conn->prepare($sql);
       $stmt->bindParam(':id' , $id_sanpham);

       $stmt->execute();

       return $stmt->fetch();
    } catch (Exception $e) {
       echo 'Loi: ' . $e->getMessage();
    }
  }

  public function updateSoLuong($id_giohang,$id_sanpham,$updateSoLuong){
    try{
      $sql = 'UPDATE cartitem SET soluong = :soluong 
      WHERE id_giohang'
    }catch(Exception $e){
      echo 'Loi: ' . $e->getMessage();
    }
  }
}
?>