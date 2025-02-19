<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* body {
            background: url('https://sucisuci.com/wp-content/uploads/2024/05/S1289ab9817374e63addbcf71096a6c47L.jpg') no-repeat center center fixed;
            background-size: cover;
        } */
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng Nhập</h2>
        <?php if (isset($_SESSION['errors'])) { ?>
            <p class="text-danger text-center" style="font-weight: bold;">
                <?= is_array($_SESSION['errors']) ? implode('<br>', $_SESSION['errors']) : $_SESSION['errors'] ?> </p>
            <?php unset($_SESSION['errors']); // Xóa lỗi khỏi session sau khi hiển thị 
            ?>
        <?php } else { ?>
            <p class="login-box-msg text-center" style="color: red; font-size: 17px; ">
                Vui Lòng Đăng Nhập
            </p>
        <?php } ?>
        <form action="<?= BASE_URL.'?act=check-dang-nhap-client' ?>" method="post">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <span class="text-danger">
                    <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>

                </span>
            </div>

            <div class="mb-4">
                <label for="mat_khau" class="block text-sm font-medium text-gray-700">Mật khẩu:</label>
                <input type="password" id="mat_khau" name="mat_khau" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <span class="text-danger">
                    <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['email'] : '' ?>

                </span>
            </div>


            <button type="submit" name="dangnhap"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Đăng nhập
            </button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Đã có tài khoản?
                <a href="<?= BASE_URL.'?act=form-dang-ki-client' ?>" class="text-blue-500 hover:text-blue-600 font-semibold">
                    Đăng ký
                </a>
            </p>
            
        </div>
    </div>
</body>

</html>