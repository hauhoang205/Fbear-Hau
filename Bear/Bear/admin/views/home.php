<?php include './views/layout/header.php'; ?>
 <?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Báo cáo thống kê</h1>
          </div>
         <div class="bg-gray-100">
         <div class="content-wrapper">

        <section class="content">
            <div class="container mx-auto p-4">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                        <h3 class="text-lg font-semibold">Thống kê doanh số bán gấu bông</h3>
                    </div>
                    <div class="p-6">
                        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-gray-200 text-gray-700">
                                    <th class="border px-6 py-3 text-left">Tháng</th>
                                    <th class="border px-6 py-3 text-left">Số lượng bán</th>
                                    <th class="border px-6 py-3 text-left">Doanh thu (VNĐ)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php
                                $data = [
                                    ["Tháng 1", 150, 30000000],
                                    ["Tháng 2", 120, 25000000],
                                    ["Tháng 3", 180, 40000000],
                                    ["Tháng 4", 210, 45000000],
                                    ["Tháng 5", 190, 38000000],
                                    ["Tháng 6", 230, 50000000]
                                ];
                                foreach ($data as $row) {
                                    echo "<tr class='hover:bg-gray-100 transition-all'>
                                        <td class='border px-6 py-3'>{$row[0]}</td>
                                        <td class='border px-6 py-3'>{$row[1]}</td>
                                        <td class='border px-6 py-3 font-semibold text-green-600'>" . number_format($row[2], 0, ',', '.') . " VNĐ</td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
         </div> 
  
        </div>
      </div>
    </section>

   
  </div>
  
  <?php include './views/layout/footer.php' ?>


</body>
</html>
