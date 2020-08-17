<?php
$errors = array();
if (isset($_POST['sbm'])) {
	extract($_REQUEST);
	$okUpload = false;
	if ($_FILES['news_image']['size'] > 0) {
		$okUpload = true;
		$news_image = uniqid() . $_FILES['news_image']['name'];
	} else {
		$news_image = '';
	}
	insert_news($news_title, $news_content, $news_image, $news_text);

	if ($okUpload) {
		move_uploaded_file($_FILES['news_image']['tmp_name'], '../images/' . $news_image);
	}
	$_SESSION['news'] = "Thêm tin tức thành công";
	header('Location:' . ROOT . 'admin/?page=news');
	die();
}
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
<link rel="stylesheet" href="themes/css/trumbowyg.min.css">


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
						<a href="<?= ROOT ?>admin/?page=login">Đăng xuất</a>
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
				<li><a href="">Quản lý tin tức</a></li>
				<li class="active">Thêm tin tức</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thêm tin tức</h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-8">
							<!-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> -->
							<form role="form" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Tên tin tức:</label>
									<input required type="text" name="news_title" class="form-control" placeholder="Tên tin tức...">
								</div>
								<div class="form-group">
									<label>Nội dung bên ngoài:</label>
									<textarea required name="news_content" class="form-control" rows="3" placeholder="Nội dung..."></textarea>
								</div>
								<div class="form-group">
									<label>Nội dung bên trong:</label>
									<textarea id="news_text" required name="" class="form-control" rows="3" placeholder="Nội dung..."></textarea>
								</div>
								<div class="form-group">
									<label>Hình ảnh:</label>
									<input type="file" name="news_image" class="form-file-input border" id="">
								</div>
								<button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
								<button type="reset" class="btn btn-default">Làm mới</button>
						</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div>
		<!--/.main-->
		<script src="themes/js/jquery-3.3.1.js"></script>
    <script src="themes/js/trumbowyg.min.js"></script>
    <script>
        $.trumbowyg.svgPath = 'themes/css/icons.svg';
        $('#news_text').trumbowyg();
        
    </script>
</body>

</html>