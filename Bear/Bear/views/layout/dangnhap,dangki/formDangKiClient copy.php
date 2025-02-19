<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://png.pngtree.com/thumb_back/fw800/background/20230616/pngtree-adorable-teddy-bears-and-fluffy-squishmallow-clouds-in-a-3d-rendered-image_3620966.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color:rgb(55, 155, 153);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
            margin-left: 30px;

        }
        input, select, button {
            width: 85%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            margin-left: 30px;
        }
        button {
            background-color: rgb(55, 155, 153);
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .footer{
           text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng Ký Tài Khoản</h2>
        <form action="<?= BASE_URL . '?act=check-dang-ki-client' ?>" method="post">
            <label for="ho">Họ:</label>
            <input type="text" id="ho" name="ho" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['ho']) ?>
            </span>

            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['ten']) ?>
            </span>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['email']) ?>
            </span>

            <label for="mat_khau">Mật khẩu:</label>
            <input type="password" id="mat_khau" name="mat_khau" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['mat_khau']) ?>
            </span>

            <label for="dien_thoai">Điện thoại:</label>
            <input type="text" id="dien_thoai" name="dien_thoai" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['dien_thoai']) ?>
            </span>

            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" id="dia_chi" name="dia_chi" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['dia_chi']) ?>
            </span>

            <label for="thanhpho">Thành phố:</label>
            <input type="text" id="thanhpho" name="thanhpho" required>
            <span class="text-danger">
                 <?= !empty($_SESSION['errors']['thanhpho']) ?>
            </span>


            <button type="submit" name="dangky">Đăng ký</button>
            <div class="footer">
            <p >
                Đã có tài khoản? 
                <a href="<?= BASE_URL . '?act=form-dang-nhap-client' ?>" class="text-blue-500 hover:text-blue-600 font-semibold">
                    Đăng nhập
                </a>
            </p>
           
        </div>
        </form>


    </div>
</body>
</html>
