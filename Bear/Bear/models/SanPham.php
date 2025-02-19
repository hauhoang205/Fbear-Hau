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
}
?>