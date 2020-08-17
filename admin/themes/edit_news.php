<?php
$id = $_GET['id'];
if (isset($_POST['btnEdit'])) {
    extract($_REQUEST);
    $ok = false;
    if ($_FILES['news_image']['size'] > 0) {
        $ok = true;
        $news_image = uniqid() . $_FILES['news_image']['name'];
    } else {
        $news_image = "";
    }
    if ($ok == true) {
        $news_image = $news_image;
    } else {
        $news_image = isset($_POST['hinh']) ? $_POST['hinh'] : '';
    }
    update_news($news_title,$news_content,$news_image, $news_text, $id);
    if ($ok == true) {
        move_uploaded_file($_FILES['news_image']['tmp_name'], '../images/' . $news_image);
    }
    $_SESSION['news'] = "Cập nhập tin tức thành công";
    header('Location:' . ROOT . 'admin/?page=news');
    die();
}
if (!isset($_SESSION['hoten'])) {
    header('location: ' . ROOT . 'admin/?page=login');
}
$promotion_one = list_one_news('id', $id);
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
                <li><a href="">Quản lý Tin tức</a></li>
                <li class="active">Tin tức <?= $promotion_one['news_title'] ?></li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức:<?= $promotion_one['news_title'] ?></h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <!-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> -->
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="trade_name">Tên tin tức: </label>
                                    <input type="text" name="news_title" id="name" class="form-control" placeholder="Nhập tên danh mục" value="<?= $promotion_one['news_title'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="trade_name">Nội dung: </label>
                                    <input type="text" name="news_content" id="name" class="form-control" placeholder="Nhập tên danh mục" value="<?= $promotion_one['news_content'] ?>" required>
                                </div>
                                <?php if ($promotion_one['news_image'] != '') : ?>
                                    <img src="../images/<?= $promotion_one['news_image'] ?>" alt="" width="120">
                                    <input type="hidden" name="hinh" value="<?= $promotion_one['news_image'] ?>">
                                <?php endif; ?>
                                <div class="form-group">
                                    <input type="file" name="news_image" class="form-file-input border" id="<?= $promotion_one['id'] ?>">
                                </div>
                                <button type="submit" name="btnEdit" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col-->
        </div>
        <!--/.main-->
</body>

</html>