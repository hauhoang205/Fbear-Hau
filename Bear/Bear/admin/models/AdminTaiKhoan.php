<?php

class AdminTaiKhoan {
    public $conn;

    public function __construct()
    { 
       $this->conn = connectDB();
    }                                                                                                                                                                                                              

    public function getAllTaiKhoan($vai_tro){
      try{
       $sql = 'SELECT * FROM user WHERE vai_tro = :vai_tro';
          $stmt = $this->conn->prepare($sql);

          $stmt->execute(
            [
               ':vai_tro' => $vai_tro
            ]
          );
          
          return $stmt->fetchAll();

      }catch(Exception $e){
       echo "Loi" . $e->getMessage();
      }
    }

    public function insertTaiKhoan($ten, $ho,$dien_thoai,$dia_chi,$thanhpho,$ngay_capnhat, $email, $mat_khau, $vai_tro){
        try {
            $sql = 'INSERT INTO user (ten, ho,dien_thoai,dia_chi,thanhpho,ngay_capnhat, email, mat_khau, vai_tro) VALUES (:ten, :ho,:dien_thoai,:dia_chi,:thanhpho,:ngay_capnhat, :email, :mat_khau, :vai_tro)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten' => $ten,
                ':ho' => $ho,
                ':dien_thoai' => $dien_thoai,
                ':dia_chi' => $dia_chi,
                ':ngay_capnhat' => $ngay_capnhat,
                ':email' => $email,
                ':thanhpho' => $thanhpho,
                ':mat_khau' => $mat_khau,
                ':vai_tro' => $vai_tro
            ]);
            
            echo "Thêm thành công";
            return true;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage(); 
            exit();
        }
        
      }

      public function getDetailTaiKhoan($id){
        try{
            $sql = 'SELECT * FROM user WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
              ':id' => $id,
            ]);
            
            return $stmt->fetch();

        }catch(Exception $e){
         echo "Loi" . $e->getMessage();
        }
      }

      public function updateTaiKhoan($id,$ten,$email,$dien_thoai){
        try {
          $sql = "UPDATE user
          SET ten = :ten, email = :email ,dien_thoai = :dien_thoai
          WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten' => $ten,
                ':email' => $email,
                ':dien_thoai' => $dien_thoai
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function resetPassword($id,$mat_khau){
      try {
        $sql = "UPDATE user
        SET mat_khau = :mat_khau
        WHERE id = :id";
  
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
              ':id' => $id,
              ':mat_khau' => $mat_khau
          ]);
          return true;
      } catch (Exception $e) {
          echo "Lỗi: " . $e->getMessage();
      }
  }

  public function updateKhachHang($id,$ten,$email,$dien_thoai,$dia_chi){
    try {
      $sql = "UPDATE user
      SET ten = :ten, email = :email ,dien_thoai = :dien_thoai ,dia_chi = :dia_chi
      WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':ten' => $ten,
            ':email' => $email,
            ':dien_thoai' => $dien_thoai,
            ':dia_chi' => $dia_chi

        ]);
        return true;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

public function checkLogin($email, $mat_khau) {
  $adminAccounts = [
      ["email" => "hauhoang123@gmail.com", "mat_khau" => "123456"],
      ["email" => "hauhoang99@gmail.com", "mat_khau" => "123456"],
      ["email" => "nguyenminh99@gmail.com", "mat_khau" => "123456"]
  ];

  foreach ($adminAccounts as $account) {
      if ($email === $account['email'] && $mat_khau === $account['mat_khau']) {
          return ['email' => $account['email'], 'vai_tro' => 'admin']; 
      }
  }

  return "Thông tin đăng nhập không chính xác";
}


}