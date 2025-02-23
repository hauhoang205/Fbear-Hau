<?php
   class AdminDonHang {
      public $conn;

      public function __construct()
      { 
         $this->conn = connectDB();
      }                                                                                                                                                                                                              

      public function getAllDonHang(){
        try{            
            $sql = 'SELECT * FROM orders';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            
            return $stmt->fetchAll();

        }catch(Exception $e){
         echo "Loi" . $e->getMessage();
        }
      }

          public function getDetailDonHang($id){
         try{
             $sql = 'SELECT * FROM orders WHERE id = :id';
 
             $stmt = $this->conn->prepare($sql);
 
             $stmt->execute([
               ':id' => $id,
             ]);
             
             return $stmt->fetch();
 
         }catch(Exception $e){
          echo "Loi" . $e->getMessage();
         }
       }

       public function getListDonHang($id)
       {
           try {
               $sql = 'SELECT orderitem.*, product.ten
               FROM orderitem
               INNER JOIN product ON orderitem.id_sanpham = product.id
               WHERE orderitem.id_dathang = :id';
   
               $stmt = $this->conn->prepare($sql);
               $stmt->bindParam(':id', $id);
               $stmt->execute();
               return $stmt->fetchAll();
           } catch (Exception $e) {
               echo "lỗi" . $e->getMessage();
           }
       }

       

          public function updateDonHang($id,$ten,$dien_thoai,$email,$dia_chi,$vanchuyen_thanhpho,$trangthai){
        try {
          $sql = "UPDATE orders
          SET ten = :ten, dien_thoai = :dien_thoai, email = :email, 
              dia_chi = :dia_chi, vanchuyen_thanhpho = :vanchuyen_thanhpho, 
              trangthai = :trangthai
          WHERE id = :id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten' => $ten,
                ':dien_thoai' => $dien_thoai,
                ':email' => $email,
                ':dia_chi' => $dia_chi,
                ':vanchuyen_thanhpho' => $vanchuyen_thanhpho,
                ':trangthai' => $trangthai,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDonHangFromKhachHang($id_KH){
      try{            
          $sql = 'SELECT * FROM orders WHERE id_KH = :id_KH';
  
          $stmt = $this->conn->prepare($sql);
  
          $stmt->execute([
              ':id_KH' => $id_KH
          ]);
          
          return $stmt->fetchAll();
  
      }catch(Exception $e){
          echo "Lỗi: " . $e->getMessage();
      }
  }
  

    //   public function insertDonHang($ten,$mota,$id_danhmuc,$gia_coso,$cosan_stock,$ma_hang,$trang_thai,$ngay_capnhat,$hinhanh){
    //      try{
    //          $sql = 'INSERT INTO product (ten,mota,id_danhmuc,gia_coso,cosan_stock,ma_hang,trang_thai,ngay_capnhat,hinhanh)
    //           VALUES (:ten,:mota,:id_danhmuc,:gia_coso,:cosan_stock,:ma_hang,:trang_thai,:ngay_capnhat,:hinhanh) ';
 
    //          $stmt = $this->conn->prepare($sql);
 
    //          $stmt->execute([
    //            ':ten' => $ten,
    //            ':mota' => $mota,
    //             ':id_danhmuc' =>$id_danhmuc,
    //             ':gia_coso' =>$gia_coso,
    //             ':cosan_stock' =>$cosan_stock,
    //             ':ma_hang' =>$ma_hang,
    //             ':trang_thai' =>$trang_thai,
    //             ':ngay_capnhat' =>$ngay_capnhat,
    //             ':hinhanh' =>$hinhanh,

    //          ]);
             
    //          return true;
 
    //      }catch(Exception $e){
    //       echo "Loi" . $e->getMessage();
    //      }
    //    }

   

   
    
       
    // public function destroySanPham($id){
    //   try{
    //       $sql = 'DELETE FROM product WHERE id = :id';

    //       $stmt = $this->conn->prepare($sql);

    //       $stmt->execute([
    //         ':id' => $id,
    //       ]);
          
    //       return true;

    //   }catch(Exception $e){
    //    echo "Loi" . $e->getMessage();
    //   }
    // }
    }

