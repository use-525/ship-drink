<?php
$id = $_GET['id'];
if (isset($_POST['sbm'])) {
    extract($_REQUEST);
    $okUpload = false;
    if ($_FILES['prd_image']['size'] > 0) {
        $okUpload = true;
        $prd_image = uniqid() . $_FILES['prd_image']['name'];
    } else {
        $prd_image = "";
    }

    if ($okUpload == true) {
        $prd_image = $prd_image;
    } else {
        $prd_image = isset($_POST['hinh']) ? $_POST['hinh'] : '';
    }
    update_product(
        $prd_name,
        $cat_id,
        $prd_image,
        $prd_price,
        $prd_warranty,
        $prd_accessory,
        $prd_featured,
        $prd_status,
        $prd_detail,
        $prd_view,
        $link_video,
        $pro_id,
        $trade_id,
        $id
    );

    if ($okUpload == true) {
        move_uploaded_file($_FILES['prd_image']['tmp_name'], '../images/' . $prd_image);
    }
    $_SESSION['products'] = "Sửa sản phẩm thành công";
    header('Location:' . ROOT . 'admin/?page=product');
    die();
}
$product_one = list_one_product('id', $id);
$category_list = list_all_category();
$promotion_list = list_all_promotion();
$trademark_list = list_all_trademark();
if (!isset($_SESSION['hoten'])) {
    header('location: ' . ROOT . 'admin/?page=login');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Team8Drink</title>

    <link href="themes/css/bootstrap.min.css" rel="stylesheet">
    <link href="themes/css/datepicker3.css" rel="stylesheet">
    <link href="themes/css/bootstrap-table.css" rel="stylesheet">
    <link href="themes/css/styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="themes/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Team8Drink </span></a>
                <?php if (isset($_SESSION['hoten'])) : ?>
                    <a class="navbar-brand" href="#">welcome <?php echo $_SESSION['hoten'] ?></a>
                <?php endif ?>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="<?= ROOT ?>admin/?page=login"> Đăng xuất</a>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="active"><a href="<?= ROOT ?>admin/?page=dashboard"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> Dashboard</a></li>
            <li><a href="<?= ROOT ?>admin/?page=member"><svg class="glyph stroked male user ">
                        <use xlink:href="#stroked-male-user" /></svg>Quản lý thành viên</a></li>
            <li><a href="<?= ROOT ?>admin/?page=category"><svg class="glyph stroked open folder">
                        <use xlink:href="#stroked-open-folder" /></svg>Quản lý danh mục</a></li>
            <li><a href="<?= ROOT ?>admin/?page=product"><svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>Quản lý sản phẩm</a></li>
            <li><a href="<?= ROOT ?>admin/?page=comment"><svg class="glyph stroked two messages">
                        <use xlink:href="#stroked-two-messages" /></svg> Quản lý bình luận</a></li>
            <li><a href="<?= ROOT ?>admin/?page=promotion"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-chain" /></svg> Quản lý chương trình khuyến mãi</a></li>
            <li><a href="<?= ROOT ?>admin/?page=trademark"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-landscape" /></svg> Quản lý thương hiệu</a></li>
            <li><a href="<?= ROOT ?>admin/?page=card"><svg class="glyph stroked gear">
                        <use xlink:href="#stroked-trash" /></svg> Quản lý giỏ hàng</a></li>
            <li><a href="<?= ROOT ?>admin/?page=news"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-clipboard-with-paper" /></svg>Tin Tức</a></li>
            <li><a href="<?= ROOT ?>admin/?page=slider"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-line-graph" /></svg>Slider</a></li>
            <li><a href="<?= ROOT ?>admin/?page=letter"><svg class="glyph stroked chain">
                        <use xlink:href="#stroked-email" /></svg>Thư khách hàng</a></li>
        </ul>

    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
                <li class="active">Sản phẩm <?= $product_one['prd_name'] ?></li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm: <?= $product_one['prd_name'] ?></h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?= $product_one['prd_name'] ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="prd_price" required value="<?= $product_one['prd_price'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input type="text" name="prd_warranty" required value="<?= $product_one['prd_warranty'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input type="text" name="prd_accessory" required value="<?= $product_one['prd_accessory'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required name="prd_featured" type="text" value="<?= $product_one['prd_featured'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Link Video</label>
                                    <textarea name="link_video" required class="form-control" rows="3"><?= $product_one['link_video'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Lượt xem</label>
                                    <input type="number" name="prd_view" required value="<?= $product_one['prd_view'] ?>" class="form-control">
                                </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label><br>
                                <?php if ($product_one['prd_image'] != '') : ?>
                                    <img src="../images/<?= $product_one['prd_image'] ?>" alt="" width="120">
                                    <input type="hidden" name="hinh" value="<?= $product_one['prd_image'] ?>">
                                <?php endif; ?>
                                <div class="form-group">
                                    <input type="file" name="prd_image" class="form-file-input border" id="">
                                </div>
                                <input type="hidden" name="id" value="<?= $product_one['id'] ?>">
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="cat_id" class="form-control">
                                    <?php foreach ($category_list as $ct) : ?>
                                        <?php if ($product_one['cat_id'] == $ct['id']) : ?>
                                            <option selected value=<?= $ct['id'] ?>><?= $ct['cat_name'] ?></option>
                                        <?php else : ?>
                                            <option value=<?= $ct['id'] ?>><?= $ct['cat_name'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select name="trade_id" class="form-control">
                                    <?php foreach ($trademark_list as $ct) : ?>
                                        <?php if ($product_one['trade_id'] == $ct['id']) : ?>
                                            <option selected value=<?= $ct['id'] ?>><?= $ct['trade_name'] ?></option>
                                        <?php else : ?>
                                            <option value=<?= $ct['id'] ?>><?= $ct['trade_name'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Chương trình khuyễn mãi</label>
                                <select name="pro_id" class="form-control">
                                    <?php foreach ($promotion_list as $ct) : ?>
                                        <?php if ($product_one['pro_id'] == $ct['id']) : ?>
                                            <option selected value=<?= $ct['id'] ?>><?= $ct['pro_name'] ?></option>
                                        <?php else : ?>
                                            <option value=<?= $ct['id'] ?>><?= $ct['pro_name'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="prd_status" class="form-control">
                                    <?php if ($product_one['prd_status'] == 1) : ?>
                                        <option selected value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                    <?php else : ?>
                                        <option selected value="0">Hết hàng</option>
                                        <option value="1">Còn hàng</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea name="prd_detail" required class="form-control" rows="3"><?= $product_one['prd_detail'] ?></textarea>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div>
    <!--/.main-->
</body>

</html>