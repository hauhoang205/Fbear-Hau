<?php include './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng: <?=$donHang['phien_token']  ?></h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
              if($donHang['trangthai'] == 'xử lý') {
                $colorAleter = 'primary';
              }elseif($donHang['trangthai'] == 'vận chuyển'){
                   $colorAleter = 'warning';
              }elseif($donHang['trangthai'] == 'đã giao'){
                   $colorAleter = 'success';
              }else {
                $colorAleter = 'danger';
              }
            ?>
            <div class="alert alert-<?=$colorAleter ?>" role="alert">
            Đơn hàng: <?= $donHang['trangthai'] ?>
        </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Shop gấu bông Hauhoang-Vanminh
                    <small class="float-right">Date: <?= $donHang['ngay_capnhat'] ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                Thông tin người đặt
                <address>
                    Tên :<strong><?= $donHang['ten'] ?></strong><br>
                    Email: <?= $donHang['email'] ?><br>
                     Số điện thoại: <?= $donHang['dien_thoai']  ?><br>
                     Địa chỉ: <?= $donHang['dia_chi']  ?><br>

                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Thông tin
                  <address>
                    <strong>Mã đơn hàng: <?= $donHang['phien_token'] ?></strong><br>
                     Tổng tiền: <?= $donHang['tong_gia'] ?><br>
                      Ghi chú: <?= $donHang['vanchuyen_thanhpho'] ?><br>
                     Thanh toán: Tiền mặt<br>

                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $tong_tien = 0; ?>
                        <?php foreach($sanPhamDonHang as $key=>$sanPham): ?> 
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $sanPham['ten'] ?></td>
                      <td><?= $sanPham['gia'] ?></td>
                      <td><?= $sanPham['soluong'] ?></td>
                      <td><?= $sanPham['tong_gia'] ?></td>
                    </tr>
                     <?php $tong_tien += $sanPham['tong_gia'] ?>
                   <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <small class="float-right">Ngày đặt: <?= $donHang['ngay_capnhat'] ?></small>

              <!-- /.row -->

              <div class="row">

                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Thành tiền:</th>
                        <td><?= $tong_tien?></td>
                      </tr>
                      <tr>
                        <th>Vận chuyển</th>
                        <td>50000</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?= $tong_tien + 50000 ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>

<?php include './views/layout/footer.php' ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</body>

</html>