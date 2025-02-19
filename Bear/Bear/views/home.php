
<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

<body class="bg-pink-100">
  
  <section class="mt-6 container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <aside class="bg-white p-6">
  <h2 class="text-xl font-bold text-pink-500 mb-6 text-center uppercase">Danh Mục Sản Phẩm</h2>
  <ul class="space-y-4 text-base">
    <?php foreach($listDanhMuc as $danhMuc): ?>
      <li>
        <a href="#" >
        <a href="<?= BASE_URL.'?act=san-pham&id_danhmuc='.$danhMuc['id']?> " class="flex items-center space-x-2 text-gray-700 hover:text-pink-500 text-lg">

          <span>🐻</span>
          <span class="font-medium hover:underline"><?=$danhMuc['ten'] ?></span>
        </a>
      </li>
    <?php endforeach ?>
  </ul>
</aside>


      <div class="col-span-3">
        <div class="relative bg-white shadow-md rounded-lg overflow-hidden">
          <!-- Slideshow container -->
          <div class="slideshow-container">
            <!-- Slide 1 -->
            <div class="slide fade">
              <img src="./img/Banner-thuong-ngay_GB-be-yeu.jpg" alt="Slide 1" class="w-full h-90 object-cover rounded-lg">
            </div>
            <!-- Slide 2 -->
            <div class="slide fade">
              <img src="./img/Banner-thuong-ngay_GB-sinh-nhat.jpg" alt="Slide 2" class="w-full h-90 object-cover rounded-lg">
            </div>
            <!-- Slide 3 -->
            <div class="slide fade">
              <img src="./img/Banner-thuong-ngay_GB-tang-gai.jpg" alt="Slide 3" class="w-full h-90 object-cover rounded-lg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- product -->
  <body class="bg-pink-50 font-sans">
  <!-- Header -->
  <header class="bg-pink-200 text-center py-6">
    <h1 class="text-3xl font-bold text-pink-600">GAUBONGONLINE - SHOP GẤU BÔNG ĐẸP VÀ CAO CẤP TẠI HÀ NỘI - TPHCM</h1>
  </header>

  <!-- Service Section -->
  <div class="container mx-auto px-6">
    <div class=" flex flex-wrap justify-between items-center text-center md:text-left space-y-6 md:space-y-0 mt-6">
      <div class="md:w-1/5">
        <div class="flex flex-col items-center ">
          <img src="./img/icon1.png" alt="Giao Hàng Tận Nhà" class=" mb-3 h-20">
          <p class="font-semibold text-lg">GIAO HÀNG TẬN NHÀ</p>
        </div>
      </div>
      <div class=" md:w-1/5">
        <div class="flex flex-col items-center">
          <img src="./img/icon2.png" alt="Gói Quà Siêu Đẹp" class="mb-3 h-20">
          <p class="font-semibold text-lg">GÓI QUÀ SIÊU ĐẸP</p>
        </div>
      </div>
      <div class=" md:w-1/5">
        <div class="flex flex-col items-center">
          <img src="./img/icon3.png" alt="Cách Giặt Gấu Bông" class="mb-3 h-20">
          <p class="font-semibold text-lg">CÁCH GIẶT GẤU BÔNG</p>
        </div>
      </div>
      <div class=" md:w-1/5">
        <div class="flex flex-col items-center">
          <img src="./img/icon4.png" alt="Bảo Hành Gấu Bông" class="mb-3 h-20">
          <p class="font-semibold text-lg">BẢO HÀNH GẤU BÔNG</p>
        </div>
      </div>
      <div class=" md:w-1/5">
        <div class="flex flex-col items-center">
          <img src="./img/icon5.png" alt="Bảo Hành Gấu Bông" class="mb-3 h-20">
          <p class="font-semibold text-lg">NÉN NHỎ GẤU</p>
        </div>
      </div>
    </div>

  <!-- Product Categories -->
  <section class="px-10 py-8">
    <div class="grid grid-cols-3 gap-2">
      <?php foreach($listDanhMuc as $danhMuc) : ?>
      <div class="bg-pink-100 rounded-lg shadow-lg overflow-hidden">
        <img src="./img/gaubong1.png" alt="Gấu Bông tặng Bạn Gái" class="w-full">
        <a href="<?= BASE_URL.'?act=san-pham&id_danhmuc='.$danhMuc['id']?> ">
        <p class="text-center font-bold text-pink-600 py-4"><?= $danhMuc['ten'] ?></p>
        </a>
      </div>
      <?php endforeach ;?>
    </div>
  </section>


  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">Sản phẩm nổi bật</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach($listSanPham as $sanPham): ?>  
      <a href="<?= BASE_URL.'?act=chi-tiet-sp&id_sanpham='.$sanPham['id'] ?>">

      <div class="bg-white p-4 rounded-lg shadow-lg">
    <img src="<?= BASE_URL . $sanPham['hinhanh'] ?>" alt="Gấu Bông" class="w-full rounded-lg hover-img">
    <p class="text-center font-bold text-pink-600 py-4"><?= $sanPham['ten'] ?></p>
    <p class="text-pink-600 text-xl font-bold text-center">
        <?= number_format($sanPham['gia_coso'], 0) ?>₫
    </p>
</div>


      <?php endforeach ?>
      
    </div>
  </div>
</body>

 <?php require_once 'layout/footer.php' ?>  
  <script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    function showSlides() {
      slides.forEach((slide, index) => {
        slide.style.display = index === currentIndex ? "block" : "none";
      });
      currentIndex = (currentIndex + 1) % slides.length;
    }
    setInterval(showSlides, 3000); 
    showSlides();
    

     // JavaScript to handle size selection and price update
     document.addEventListener("DOMContentLoaded", function () {
  const sizeOptions = document.querySelectorAll(".size-option");
  
  sizeOptions.forEach(option => {
    option.addEventListener("click", function () {
      // Find the parent product container
      const product = this.closest('.bg-white');
      const priceDisplay = product.querySelector(".price-display");

      // Remove active class from all buttons
      sizeOptions.forEach(btn => btn.classList.remove("active-size"));

      // Add active class to the clicked button
      this.classList.add("active-size");

      // Update the price display
      const newPrice = this.dataset.price;
      priceDisplay.textContent = parseInt(newPrice).toLocaleString() + "đ";
    });
  });
});

  </script>
</body>
</html>
