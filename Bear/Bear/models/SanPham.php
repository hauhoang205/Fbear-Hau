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

  public function getNguoiDungFromEmail($user){
     try{
        $sql = 'SELECT * FROM user WHERE id = :id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id' , $user);
        $stmt->execute();
        return $stmt->fetch();

     }catch(Exception $e){
        echo 'Loi: ' .$e->getMessage();
     }
  } 

  public function getGioHangFromUser($id){
    try {
      $sql = 'SELECT * FROM gio_hangs WHERE id_nguoi_dung = :id_nguoi_dung';
      
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id_nguoi_dung' , $id);
      $stmt->execute();

      return $stmt->fetch();
    }catch(Exception $e){
      echo 'Loi: ' .$e->getMessage();
   }
  } 

 public function addGioHang($id){
    try{
       $sql = 'INSERT INTO gio_hangs (id_nguoi_dung) VALUES (:id)';

       $stmt = $this->conn->prepare($sql);
       $stmt->bindParam(':id' , $id);
       $stmt->execute();

       return $this->conn->lastInsertId();
    }catch(Exception $e){
      echo 'Loi: ' .$e->getMessage();
   }
 }


 public function getDetailGioHang($id){
     try{
        $sql = 'SELECT chi_tiet_gio_hangs.*, product.ten, product.hinhanh ,product.gia_coso
        FROM chi_tiet_gio_hangs 
        INNER JOIN product ON chi_tiet_gio_hangs.id_san_pham = product.id
        WHERE chi_tiet_gio_hangs.id_gio_hang = :id_gio_hang';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_gio_hang' , $id);
        $stmt->execute();

        return $stmt->fetchAll();
     }catch(Exception $e){
      echo 'Loi: ' .$e->getMessage();
   }
 }

 public function updateSoLuong($id_gio_hang, $id_san_pham, $updateSoLuong)
 {
     try {
         $sql = 'UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong
          WHERE id_gio_hang = :id_gio_hang AND id_san_pham = :id_san_pham
         ';

         $stmt = $this->conn->prepare($sql);

         $stmt->bindParam(':id_gio_hang', $id_gio_hang);
         $stmt->bindParam(':id_san_pham', $id_san_pham);
         $stmt->bindParam(':so_luong', $updateSoLuong);
         $stmt->execute();
         return true;
     } catch (Exception $e) {
         echo 'lỗi: ' . $e->getMessage();
     }
 }
 public function addDetailGioHang($id_gio_hang, $id_san_pham, $so_luong)
 {
     try {
         $sql = 'INSERT INTO chi_tiet_gio_hangs (id_gio_hang, id_san_pham, so_luong)
             VALUES (:id_gio_hang, :id_san_pham, :so_luong)
         ';

         $stmt = $this->conn->prepare($sql);

         $stmt->bindParam(':id_gio_hang', $id_gio_hang);
         $stmt->bindParam(':id_san_pham', $id_san_pham);
         $stmt->bindParam(':so_luong', $so_luong);
         $stmt->execute();

         return true;
     } catch (Exception $e) {
         echo 'lỗi: ' . $e->getMessage();
     }
 }
 

  public function getSanPhamById($id_san_pham)
  {
      try {
          $sql = 'SELECT * FROM product
          WHERE id = :id  ';

          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':id', $id_san_pham);

          $stmt->execute();

          return $stmt->fetch();
      } catch (Exception $e) {
          echo 'lỗi: ' . $e->getMessage();
      }
  }

  public function xoa($id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE id = :id   
                ';

            $stmt = $this->conn->prepare($sql);

            // Gán giá trị cho tham số san_pham_id
            $stmt->bindParam(':id', $id);


            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Trả về danh sách sản phẩm
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }

    }
}
?>