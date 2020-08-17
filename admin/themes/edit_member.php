<?php
$id = $_GET['id'];
$errors = array();
if (isset($_POST['sbm'])) {
	extract($_REQUEST);
	$re_pass = $_POST['re_password'];
	// $u = query('email', $email);
	// $n = query('name_user',$name_user);
	if (empty($member_name)) {
		array_push($errors, "Không được để trống họ và tên");
	}
	if (empty($email)) {
		array_push($errors, "Không được để trống Email");
	}
	if (empty($password)) {
		array_push($errors, "Không được để trống mật khẩu");
	}
	if ($re_pass != $password) {
		array_push($errors, "Mật khẩu 2 phải giống mật khẩu 1");
	}
	if ($u['email'] == $email) {
		array_push($errors, "Email trùng email cũ, mời bạn đổi!");
	}
	// if($u['name_user'] == $name_user){
	//     array_push($errors, "Username trùng username cũ, mời bạn đổi!");
	// }
	if (count($errors) == 0) {
		$pass = md5($password);
		//$user_level = (isset($user_level)) ? true : false;
		update_member($member_name, $email, $pass, $member_level, $phone, $address, $id);
		$_SESSION['member'] = "Cập nhập người dùng thành công";
		header("location: " . ROOT . "admin/?page=member");
		die();
	}
}
if (!isset($_SESSION['hoten'])) {
	header('location: ' . ROOT . 'admin/?page=login');
}
$member_one = list_one_member('id', $id);
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
				<li><a href="">Quản lý thành viên</a></li>
				<li class="active"><?= $member_one['member_name'] ?></li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?= $member_one['member_name'] ?></h1>
			</div>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-8">
							<?php if (count($errors) > 0) : ?>
								<?php foreach ($errors as $error) : ?>
									<div class="alert alert-danger">
										<?php echo $error; ?>
									</div>
								<?php endforeach ?>
							<?php endif ?>
							<form role="form" method="post">
								<div class="form-group">
									<label>Họ & Tên</label>
									<input type="text" name="member_name" required class="form-control" value="<?= $member_one['member_name'] ?>" placeholder="">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" required value="<?= $member_one['email'] ?>" class="form-control">
								</div>
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" name="password" required class="form-control">
								</div>
								<div class="form-group">
									<label>Nhập lại mật khẩu</label>
									<input type="password" name="re_password" required class="form-control">
								</div>
								<div class="form-group">
									<label>Quyền</label><br>
									<!-- <input type="checkbox" name="user_level" class="form-check-input status" id="" <?= ($member_one['user_level'] == 1) ? 'checked' : '' ?> <label for="user_level" class="status-title">Trạng thái <span id="span"><?= ($user['user_level'] == 1) ? 'Admin' : 'Member' ?></span></label> -->
									<?php if ($member_one['member_level'] == true) : ?>
										<option value="Admin">Admin</option>
									<?php else : ?>
										<option value="Member">Member</option>
									<?php endif; ?>
								</div>
								<div class="form-group">
									<label for="">Cập nhập quyền</label>
									<select name="member_level" class="form-control">
										<option value="1">Admin</option>
										<option value="0">Member</option>
									</select>
								</div>
								<div class="form-group">
									<label>Điện thoại</label>
									<input type="text" name="phone" required class="form-control" value="<?= $member_one['phone'] ?>">
								</div>
								<div class="form-group">
									<label>Địa chỉ</label>
									<input type="text" name="address" required class="form-control" value="<?= $member_one['address'] ?>">
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