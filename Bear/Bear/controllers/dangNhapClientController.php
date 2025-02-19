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

        // Nếu có lỗi, dừng lại
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: ' . BASE_URL . '?act=form-dang-ki-client');
            exit();
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

       //Lỗi lưu vào session
         $_SESSION['errors'] = $errors;

         if(empty($errors)){
            $vai_tro= 'khách hàng';

            $this->modelDangNhap->checkdangki($ho,$ten,$email,$mat_khau,$dia_chi,$dien_thoai,$thanhpho,$vai_tro);

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
 }
?>