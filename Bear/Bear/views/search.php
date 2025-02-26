<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Gấu Bông</title>
    <style>
        body {
            background-color: #ffc0cb;
            /* Nền hồng */
            font-family: Arial, sans-serif;
        }

        .add-to-cart {
            background-color: #ff69b4;
            border: none;
            color: white;
            padding: 12px 20px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            display: inline-flex;
            align-items: center;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .add-to-cart:hover {
            background-color: #d14787;
            transform: scale(1.1);
        }

        .add-to-cart i {
            margin-right: 8px;
            font-size: 18px;
        }

        .product-detail h2 {
            color: #d14787;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php require_once 'layouts/header.php'; ?>
            <?php require_once 'layouts/menu.php'; ?>
            <div class="product-detail" style="line-height: 0.4;">
                <h2>Kết quả tìm kiếm</h2>
                <?php if (count($datasSearch) > 0): ?>
                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px; align-items: stretch;">
                        <?php foreach ($datasSearch as $SanPham): ?>
                            <div class="col-3" style="flex: 0 0 calc(25% - 20px); box-sizing: border-box;">
                                <div class="card" style="width: 100%; height: 100%;">
                                    <img src="<?= $SanPham['hinh_anh'] ?? '' ?>" class="card-img-top" alt="Gấu bông">
                                    <div class="card-body" style="text-align: center">
                                        <p class="card-text"><?= $SanPham['ten_san_pham'] ?? '' ?></p>
                                        <div class="price-wrapper" style="align-items: center; justify-content: space-between;">
                                            <div>
                                                <span class="price"><?= number_format($SanPham['gia_khuyen_mai'] ?? 0, 0, ',', '.') ?>đ</span>
                                                <span class="price-del"><?= number_format($SanPham['gia_ban'] ?? 0, 0, ',', '.') ?>đ</span>
                                            </div>
                                        </div>
                                        <br><br>
                                        <a href="?act=chi-tiet-sp&san_pham_id=<?= $SanPham['id'] ?>">
                                            <button class="add-to-cart">
                                                <i class="fa-solid fa-eye"></i> Xem chi tiết
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Không tìm thấy sản phẩm nào.</p>
                <?php endif; ?>
            </div>
            <?php require_once 'layouts/footer.php'; ?>
        </div>
    </div>
</body>

</html>
