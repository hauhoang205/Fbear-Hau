<?php 

class DangNhapClient {
   public $conn;

   public function __construct()
   {
     $this->conn = connectDB();
   }

   public function checkdangki($ten,$email,$mat_khau,$dien_thoai,$dia_chi,$thanhpho,$vai_tro,$ngay_capnhat){
       try{
           $sql = 'INSERT INTO user (ten,email,mat_khau,dien_thoai,dia_chi,thanhpho,vai_tro,ngay_capnhat)
            VALUES (:ten,:email,:mat_khau,:dien_thoai,:dia_chi,:thanhpho,:vai_tro,:ngay_capnhat)' ;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten' => $ten,
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':dien_thoai' => $dien_thoai,
                ':dia_chi' => $dia_chi,
                ':thanhpho' => $thanhpho,
                ':vai_tro' => $vai_tro,
                ':ngay_capnhat' => $ngay_capnhat
            ]);
            return true;
       }catch(Exception $e){
         echo 'Lỗi' . $e->getMessage();
       }
   }

   public function checkEmailExists($email){
      $sql = 'SELECT * FROM user WHERE email = :email';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['email' => $email]);
      return $stmt->rowCount() > 0;
   }

   public function checkPhoneExists($dien_thoai){
    $sql = 'SELECT * FROM user WHERE dien_thoai = :dien_thoai';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['dien_thoai' => $dien_thoai]);
    return $stmt->rowCount() > 0;
}
}

?>