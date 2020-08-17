<?php
$promotion_list = list_all_promotion();

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	delete_promotion($id);
	$_SESSION['promotion'] = "Xoá chương trình thành công";
	header('Location:' . ROOT . 'admin/?page=promotion');
	die();
}
if (!isset($_SESSION['hoten'])) {
	header('location: ' . ROOT . 'admin/?page=login');
}
unset($_SESSION['member']);
unset($_SESSION['category']);
unset($_SESSION['product']);
unset($_SESSION['comment']);
unset($_SESSION['cate']);
unset($_SESSION['trademark']);
unset($_SESSION['news']);
unset($_SESSION['letter']);
unset($_SESSION['slider']);
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
				<li class="active">Quản lý chương trình khuyễn mãi</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý chương trình khuyến mãi</h1>
			</div>
		</div>
		<!--/.row-->
		<div id="toolbar" class="btn-group">
			<a href="<?= ROOT ?>admin/?page=promotion&action=add" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i> Thêm chương trình khuyến mãi
			</a>
		</div>
		<?php if (isset($_SESSION['promotion'])) : ?>
			<div class="alert alert-success"><?= $_SESSION['promotion'] ?></div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toolbar="#toolbar" data-toggle="table" class="table">

							<thead>
								<tr>
									<th data-field="id" data-sortable="true" style="text-align: center">ID</th>
									<th style="text-align: center">Tên chương trình khuyến mãi</th>
									<th style="text-align: center">Hình ảnh</th>
									<th style="text-align: center">Giá trị</th>
									<th style="text-align: center">Ngày tạo</th>
									<th style="text-align: center">Ngày cập nhập</th>
									<th style="text-align: center">Hành động</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($promotion_list as $p) : ?>
									<tr>
										<td style="text-align: center"><?= $p['id'] ?></td>
										<td style="text-align: center"><?= $p['pro_name'] ?></td>
										<td style="text-align: center"><img width="130" height="180" src="../images/<?= $p['pro_image'] ?>" /></td>
										<td style="text-align: center"><?= $p['pro_sale'] ?></td>
										<td style="text-align: center"><?= $p['pro_created_at'] ?></td>
										<td style="text-align: center"><?= $p['pro_updated_at'] ?></td>

										<td class="form-group" style="text-align: center">
											<a href="<?= ROOT ?>admin/?page=promotion&action=update&id=<?= $p['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
											<a href="<?= ROOT ?>admin/?page=promotion&id=<?= $p['id'] ?>" onclick="return confirm('Bạn có chắc muốn xoá không?')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
</body>

</html>