<?php 
 class BinhLuan {
      public $conn;

      public function __construct()
      { 
         $this->conn = connectDB();
      }

      public function layBinhLuanTheoSanPham($id){
        try{
            $sql = 'SELECT * FROM comment WHERE id_san_pham = :id_san_pham AND trang_thai = 1
            ORDER BY ngay_dang DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_san_pham' , $id);
            $stmt->execute();
            
            $allComment = $stmt ->fetchAll();

            //Nếu kiểm tra ko có giá trị nào sẽ trả về mảng rỗng
            if(isset($allComment)){
                return [];
            }
            return $allComment;   //Trả về danh sách bình luận
        }catch(Exception $e){
            echo "Lay id user loi";
        }
      }

      public function themBinhLuan($id_san_pham,$id_nguoi_dung,$noi_dung,$ngay_dang,$trang_thai){
              try{
                   $sql = 'INSERT INTO comment (id_san_pham,id_nguoi_dung,noi_dung,ngay_dang,trang_thai) 
                          VALUES (:id_san_pham,:id_nguoi_dung,:noi_dung,:ngay_dang,:trang_thai)';
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        ':id_san_pham' => $id_san_pham,
                        ':id_nguoi_dung' => $id_nguoi_dung,
                        ':noi_dung' => $noi_dung,
                        ':ngay_dang' => $ngay_dang,
                        ':trang_thai' => $trang_thai
                    ]);
                      
                     return true;
              }catch(Exception $e) {
                 echo "Lỗi khi lấy bình luận"  . $e->getMessage();
              }
      }
 }
?>