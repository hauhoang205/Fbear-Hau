<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen bg-pink-300 p-5 shadow-lg">
            <div class="flex justify-center mb-5">
                <img src="uploads/<?= $user['anh_dai_dien'] ?? 'default.png' ?>" 
                     alt="Avatar" 
                     class="w-32 h-32 rounded-full border-4 border-white object-cover">
            </div>
            <ul class="space-y-4">
                <li>
                    <a href="?act=form-sua-tai-khoan-client" class="block bg-pink-400 text-white text-center py-2 rounded-lg hover:bg-pink-500">Sửa thông tin cá nhân</a>
                </li>
                <li>
                    <a href="#" class="block bg-red-400 text-white text-center py-2 rounded-lg hover:bg-red-500">Đăng xuất</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-700 mb-6">Thông tin tài khoản cá nhân</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block font-semibold">Họ và tên:</label>
                        <input disabled type="text" name="ho_ten" value="<?= $user['ho_ten'] ?? '' ?>" 
                               class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Email:</label>
                        <input disabled type="email" name="email" value="<?= $user['email'] ?? '' ?>" 
                               class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Số điện thoại:</label>
                        <input disabled type="tel" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?? '' ?>" 
                               class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Địa chỉ:</label>
                        <input disabled type="text" name="dia_chi" value="<?= $user['dia_chi'] ?? '' ?>" 
                               class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Ngày sinh:</label>
                        <input disabled type="date" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?? '' ?>" 
                               class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label class="block font-semibold">Giới tính:</label>
                        <input disabled type="text" name="gioi_tinh" value="<?= $user['gioi_tinh'] ?? '' ?>" 
                               class="w-full p-3 border rounded-lg bg-gray-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
