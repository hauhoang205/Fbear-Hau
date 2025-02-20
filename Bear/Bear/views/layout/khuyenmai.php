<?php require_once 'header.php' ?>
<?php require_once 'menu.php' ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận Khuyến Mãi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 overflow-x-hidden">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10 mb-16">
        <h1 class="text-3xl font-bold text-pink-600 text-center">🎉 Nhận Khuyến Mãi Đặc Biệt! 🎉</h1>
        <p class="text-gray-700 text-center mt-2">Đăng ký ngay để nhận ưu đãi hấp dẫn từ cửa hàng.</p>
        
        <form class="mt-6 space-y-4" onsubmit="handleSubmit(event)">
            <div>
                <label class="block text-gray-700 font-semibold">Họ và tên</label>
                <input type="text" class="w-full p-2 border rounded-lg focus:ring focus:ring-pink-300" placeholder="Nhập họ và tên" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" class="w-full p-2 border rounded-lg focus:ring focus:ring-pink-300" placeholder="Nhập email" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Số điện thoại</label>
                <input type="text" class="w-full p-2 border rounded-lg focus:ring focus:ring-pink-300" placeholder="Nhập số điện thoại" required>
            </div>
            <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 rounded-lg">
                Nhận Khuyến Mãi
            </button>
        </form>
        
        <div class="mt-6 text-center text-gray-600">
            <p>📢 Đừng bỏ lỡ! Chương trình khuyến mãi chỉ diễn ra trong thời gian ngắn.</p>
        </div>
    </div>
    
    <?php require_once 'footer.php' ?>

    <script>
        function handleSubmit(event) {
            event.preventDefault(); // Ngăn chặn gửi form mặc định
            alert("Bạn đã nhận được mã khuyến mại qua email của bạn!"); // Hiển thị thông báo
            window.location.href = "<?= BASE_URL ?>"; // Chuyển hướng về trang chủ
        }
    </script>
</body>
</html>
