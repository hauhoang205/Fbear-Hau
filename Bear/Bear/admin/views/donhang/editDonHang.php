<?php include './views/layout/header.php'; ?>
 <?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý thông tin đơn hàng </h1>
          </div>

        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin đơn hàng: <?= $donHang['phien_token'] ?></h3>
              </div>

              <form action="<?=BASE_URL_ADMIN .'?act=sua-don-hang' ?>" method="POST">
                <input type="text" name="id" value="<?= $donHang['id'] ?>" hidden>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên người đặt</label>
                    <input type="text" class="form-control" name="ten" value="<?= $donHang['ten'] ?>" placeholder="Enter tên danh mục">
                    <?php if(isset($error['ten'])) { ?>
                         <p class="text-danger"><?= $error['ten'] ?></p>
                      <?php } ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" class="form-control" name="dien_thoai" value="<?= $donHang['dien_thoai'] ?>" placeholder="Enter tên danh mục">
                    <?php if(isset($error['dien_thoai'])) { ?>
                         <p class="text-danger"><?= $error['dien_thoai'] ?></p>
                      <?php } ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $donHang['email'] ?>" placeholder="Enter tên danh mục">
                    <?php if(isset($error['email'])) { ?>
                         <p class="text-danger"><?= $error['email'] ?></p>
                      <?php } ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" value="<?= $donHang['dia_chi'] ?>" placeholder="Enter tên danh mục">
                    <?php if(isset($error['dia_chi'])) { ?>
                         <p class="text-danger"><?= $error['dia_chi'] ?></p>
                      <?php } ?>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Vận chuyển</label>
                    <textarea name="vanchuyen_thanhpho" id="" placeholder="Enter mô tả" class="form-control"> <?= $donHang['vanchuyen_thanhpho'] ?></textarea>
                  </div>
                  <div class="form-group">
    <label for="inputStatus">Trạng thái</label>
    <select name="trangthai" class="form-control custom-select">
        <!-- In ra trạng thái hiện tại của đơn hàng -->
        <option value="<?= $donHang['trangthai'] ?>" selected><?= $donHang['trangthai'] ?></option>
        
        <?php
        // Khai báo các trạng thái có sẵn
        $statusOptions = ['xử lý', 'vận chuyển', 'đã giao', 'đã hủy'];

        // Loại bỏ trạng thái hiện tại nếu nó đã có trong danh sách
        $statusOptions = array_diff($statusOptions, [$donHang['trangthai']]);

        // Hiển thị các lựa chọn còn lại
        foreach ($statusOptions as $status) {
            echo "<option value='$status'>$status</option>";
        }
        ?>
    </select>
</div>


                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include './views/layout/footer.php' ?>

</body>
</html>
