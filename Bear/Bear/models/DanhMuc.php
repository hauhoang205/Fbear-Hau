<?php

class DanhMuc {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc(){
        try{
            $sql = 'SELECT * FROM category';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "that bai" . $e->getMessage();
        }
    }
}

?>