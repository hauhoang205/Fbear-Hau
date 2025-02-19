<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-pink-600 mb-4">GIỎ HÀNG</h1>

    <!-- Thông báo trạng thái -->
    <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-4">
        Khách hàng khớp với khu vực "Giao hàng hỏa tốc"
    </div>

    <!-- Danh sách sản phẩm trong giỏ hàng -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="text-pink-600 border-b">
                    <th class="py-4 px-6 text-left">SẢN PHẨM</th>
                    <th class="py-4 px-6 text-left">GIÁ</th>
                    <th class="py-4 px-6 text-left">SỐ LƯỢNG</th>
                    <th class="py-4 px-6 text-left">TẠM TÍNH</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-pink-50">
                    <td class="py-4 px-6 flex items-center">
                        <img src="https://via.placeholder.com/80" alt="Sản phẩm" class="w-20 h-20 rounded mr-4">
                        <span class="text-pink-600">Blindbox Baby Three Mèo Tỷ Phú</span>
                    </td>
                    <td class="py-4 px-6 text-pink-600 font-bold">390.000 ₫</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <button class="px-2 py-1 rounded-l border bg-pink-100 hover:bg-pink-200">-</button>
                            <input type="number" value="1" class="w-12 text-center border-t border-b" readonly>
                            <button class="px-2 py-1 rounded-r border bg-pink-100 hover:bg-pink-200">+</button>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-pink-600 font-bold">390.000 ₫</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Các nút điều hướng -->
    <div class="flex justify-between items-center mt-4">
        <a href="#" class="text-pink-600 hover:text-pink-800">
            ← TIẾP TỤC XEM SẢN PHẨM
        </a>

        <div class="flex items-center gap-2">
            <input type="text" placeholder="Mã ưu đãi" class="border rounded-lg px-4 py-2">
            <button class="border border-pink-600 text-pink-600 hover:bg-pink-100 px-4 py-2 rounded-lg">ÁP DỤNG</button>
        </div>
    </div>

    <!-- Tổng cộng giỏ hàng -->
    <div class="mt-8 flex justify-end">
        <div class="w-full md:w-1/3 bg-pink-50 p-4 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-pink-600 mb-4">CỘNG GIỎ HÀNG</h2>
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">TẠM TÍNH</span>
                <span class="text-pink-600 font-bold">390.000 ₫</span>
            </div>
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">GIAO HÀNG</span>
                <span class="text-pink-600">Ship nội thành 4h: 35.000 ₫</span>
            </div>
            <div class="flex justify-between border-t border-gray-200 pt-2">
                <span class="text-gray-600 font-bold">TỔNG</span>
                <span class="text-pink-600 font-bold text-xl">425.000 ₫</span>
            </div>
            <button class="w-full mt-4 bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 rounded-lg">
                TIẾN HÀNH THANH TOÁN
            </button>
        </div>
    </div>
</div>
