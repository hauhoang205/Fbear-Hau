<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<header class="bg-pink-300 text-white shadow-md">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center py-4">
      <div class="flex items-center space-x-3">
        <img src="./img/logo.webp" alt="Logo" class="w-20 h-20">
        <a href="<?= BASE_URL ?>">
        <h1 class="text-4xl font-bold tracking-wide">Bear Luly</h1>
        </a>
      </div>


      <nav class="hidden md:flex space-x-8 mt-4 md:mt-0 text-lg">
    <a href="<?= BASE_URL ?>" class="text-white hover:text-pink-200 transition">Trang Chủ</a>

    <!-- Sản phẩm với popup menu -->
    <a href="<?= BASE_URL . '?act=form-khuyen-mai' ?>" class="text-white hover:text-pink-200 transition">Khuyến mại</a>
    <a href="<?= BASE_URL . '?act=gioi-thieu' ?>" class="text-white hover:text-pink-200 transition">Giới thiệu</a>
    <a href="#" class="text-white hover:text-pink-200 transition">Liên hệ</a>
</nav>


      <div class="flex items-center space-x-6 mt-4 md:mt-0">
        <div class="relative">
          <input
            type="text"
            placeholder="Tìm sản phẩm yêu thích..."
            class="px-5 py-3 w-80 md:w-96 rounded-full text-gray-700 focus:ring-2 focus:ring-pink-400 focus:outline-none placeholder-gray-500"
          >
          <button
            class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-pink-500">
            🔍
          </button>
        </div>
        <div class="flex items-center space-x-2">
          <span class="text-2xl font-bold">📞</span>
          <span class="text-xl font-semibold tracking-wide">087.8888.907
          </span>
        </div>
      </div>
      <div class="relative group">
                <a href="#" class="text-white flex items-center space-x-2 hover:text-pink-200">
                    <i class="fa-regular fa-user text-2xl"></i>
                </a>
                <div class="absolute left-0 w-48 bg-white text-gray-800 mt-2 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity ease-out duration-300 z-50">
                    <ul>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 transition">Đăng Nhập</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 transition">Đăng Ký</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" class="text-white relative">
                <i class="fa-solid fa-shopping-bag text-2xl"></i>
                <div class="absolute top-0 right-0 w-4 h-4 bg-red-600 text-white text-xs rounded-full flex items-center justify-center">3</div>
            </a>
    </div>
  </header>