<?php 
 class dangNhapClientController {
    public $modelDangNhap;

    public function __construct()
    {
        $this->modelDangNhap = new DangNhapClient();
    }

    public function formdangki(){
        require_once './views/layout/dangnhap,dangki/formDangKiClient.php';
        deleteSessionError();
    }

    public function dangki(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            
            $ho = $_POST['ho'];
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $dien_thoai = $_POST['dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $thanhpho = $_POST['thanhpho'];
            $ngay_capnhat = $_POST['ngay_capnhat'];

          $errors = [];

          if (empty($email)) {
            $errors['email'] = 'Email là bắt buộc.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email không hợp lệ. Định dạng đúng là example@gmail.com.';
        } elseif ($this->modelDangNhap->checkEmailExists($email)) {
            $errors['email'] = 'Email đã được sử dụng.';
        }
        }

        if (empty($dien_thoai)) {
            $errors['dien_thoai'] = 'Số điện thoại là bắt buộc.';
        } elseif (!preg_match('/^(?:\+84|0)[3-9]\d{8}$/', $dien_thoai)) {
            $errors['dien_thoai'] = 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng (+84 hoặc 0 ở đầu, tiếp theo là 9 chữ số).';
        } elseif ($this->modelDangNhap->checkPhoneExists($dien_thoai)) {
            $errors['dien_thoai'] = 'Số điện thoại đã được sử dụng.';
        }

        if (empty($ho)) {
            $errors['ho'] = 'Ho là bắt buộc';

        }

        if (empty($ten)) {
            $errors['ten'] = 'Name là bắt buộc';
        }

        if (empty($mat_khau)) {
            $errors['mat_khau'] = 'Mật khẩu là bắt buộc';
        }

        if (empty($dia_chi)) {
            $errors['dia_chi'] = 'Địa chỉ là bắt buộc';
        }

        if (empty($thanhpho)) {
            $errors['thanhpho'] = 'Thành phố là bắt buộc';
        }

        if (empty($ngay_capnhat)) {
            $errors['ngay_capnhat'] = 'Ngày cập nhật là bắt buộc';
        }
        // Nếu có lỗi, dừng lại
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: ' . BASE_URL . '?act=form-dang-ki-client');
            exit();
        }

        
        

       //Lỗi lưu vào session
         $_SESSION['errors'] = $errors;

         if(empty($errors)){
            $vai_tro= 'khách hàng';

            $this->modelDangNhap->checkdangki($ho, $ten, $email, $mat_khau, $dien_thoai, $dia_chi, $thanhpho, $vai_tro, $ngay_capnhat);

            header('Location: ' . BASE_URL . '?act=form-dang-nhap-client');
            exit();
         }else {
            $_SESSION['flash'] = true;
            header('Location: ' . BASE_URL . '?act=form-dang-ki-client');
             exit();
         }
    }

    public function formdangnhap(){
        require_once './views/layout/dangnhap,dangki/formDangNhapClient.php';
        deleteSessionError();
    }

    public function dangnhap(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            //   var_dump($mat_khau);die;

            $errors = [];
            if(empty($email)){
                $errors['email'] = 'Email là bắt buộc';
            }
            if(empty($mat_khau)){
                $errors['mat_khau'] = 'Password là bắt buộc';
            }

           if(empty($errors)){
              $user = $this->modelDangNhap->checkLoginClient($email,$mat_khau);
            
           }else{
             $_SESSION['errors'] = $errors;
             header('Location: ' . BASE_URL . '?act=form-dang-nhap-client');
             exit();
           }
           if(is_array($user) && $user['email'] === $email){
            $_SESSION['user_client'] = $user;
            $_SESSION['flash_message'] = 'Xin chào: ' . $user['ten'];
            session_write_close(); // Giữ session không bị mất sau redirect
            
            header('Location: ' .BASE_URL );
            // exit();
           }else {
            $_SESSION['errors'] = $user;
            $_SESSION['flash'] = true;

            header('Location: ' . BASE_URL . '?act=form-dang-nhap-client');
            exit();
           }
        }
    }

    public function logoutclient(){
        if(isset($_SESSION['user_client'])){
            unset($_SESSION['user_client']);

            $_SESSION['flash_message'] = 'Đăng xuất thành công!';
            header('Location: ' . BASE_URL . '?act=home');
        }else{
            header('Location: ' . BASE_URL . '?act=/');
        }
    }

    public function chiTietTaiKhoanClient(){
        if(isset($_SESSION['user_client'])){
            
            //Lấy thông tin người dùng từ session
            $user = $_SESSION['user_client'];
            $id = $user['id'];
            // var_dump($user);die;

            $showUser = $this->modelDangNhap->showClient($id);
            
           $_SESSION['user_client'] = $showUser;
           
            require_once './views/layout/chiTietTaiKhoan/formChiTietTaiKhoanClient.php';
        }else{
            echo "Bạn chưa đăng nhập";
        }
    }

    public function formSuaThongTinClient(){
        if(isset($_SESSION['user_client'])){
          
            $user = $_SESSION['user_client'];
            $id = $user['id'];

            require_once './views/layout/chiTietTaiKhoan/formSuaThongTinClient.php';


        }
    }

    public function suaThongTinClient(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = $_POST['id'];

            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $dien_thoai = $_POST['dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $mat_khau =  $_POST['mat_khau'];

            $errors = [];

            if(empty($ten)){
                $errors['ten'] = 'Tên bắt buộc';
            }
            if(empty($email)){
                $errors['email'] = 'Tên bắt buộc';
            }
            if (empty($dien_thoai)) {
                $errors['dien_thoai'] = 'Số điện thoại là bắt buộc.';
            } elseif (!preg_match('/^(?:\+84|0)[3-9]\d{8}$/', $dien_thoai)) {
                $errors['dien_thoai'] = 'Số điện thoại không hợp lệ. Vui lòng nhập đúng định dạng (+84 hoặc 0 ở đầu, tiếp theo là 9 chữ số).';
            }
            if(empty($dia_chi)){
                $errors['dia_chi'] = 'Tên bắt buộc';
            }

            if(empty($mat_khau)){
                $errors['mat_khau'] = 'Tên bắt buộc';
            }

            $_SESSION['errors'] = $errors;

            if(empty($errors)){
                
                $user = $this->modelDangNhap->updateUser($id,$ten,$email,$dien_thoai,$dia_chi,$mat_khau);

                $_SESSION['flash_message'] = 'Cập nhật thông tin thành công!';
                header('location: ?act=chi-tiet-tai-khoan-client');
                exit();
            }
            
        }
          
    }
 }
?>