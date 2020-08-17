<?php
if (!isset($_SESSION['hoten'])) {
	header('location: ' . ROOT . 'admin/?page=login');
}
$product = list_all_product();
$category = list_all_category();
$promotion = list_all_promotion();
$trademark = list_all_trademark();
$member = list_all_member();
$letter = list_all_letter();
$news = list_all_news();
// $comment = list_all_comment();
// $card = list_all_card();
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
				<li class="active">Trang chủ quản trị</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Trang chủ quản trị</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag">
								<use xlink:href="#stroked-bag"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($product) ?></div>
							<div class="text-muted">Sản Phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message">
								<use xlink:href="#stroked-empty-message"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Bình Luận</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($member) ?></div>
							<div class="text-muted">Thành Viên</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-bag"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($category) ?></div>
							<div class="text-muted">Danh mục</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-email"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($letter) ?></div>
							<div class="text-muted">Thư khách</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-chain"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($promotion) ?></div>
							<div class="text-muted">CT khuyến mãi</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-landscape"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($trademark) ?></div>
							<div class="text-muted">Thương hiệu</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-trash"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">giỏ hàng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content">
								<use xlink:href="#stroked-clipboard-with-paper"></use>
							</svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?= count($news) ?></div>
							<div class="text-muted">Tin tức</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>