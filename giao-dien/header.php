<?php
// if(isset($_SESSION['cart'])){
	// $demgl = count($_SESSION['cart']);
// }
// 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>TEAM8DRINK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="giao-dien/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="giao-dien/css/animate.css">

	<link rel="stylesheet" href="giao-dien/css/owl.carousel.min.css">
	<link rel="stylesheet" href="giao-dien/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="giao-dien/css/magnific-popup.css">

	<link rel="stylesheet" href="giao-dien/css/aos.css">

	<link rel="stylesheet" href="giao-dien/css/ionicons.min.css">

	<link rel="stylesheet" href="giao-dien/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="giao-dien/css/jquery.timepicker.css">


	<link rel="stylesheet" href="giao-dien/css/flaticon.css">
	<link rel="stylesheet" href="giao-dien/css/icomoon.css">
	<link rel="stylesheet" href="giao-dien/css/style.css">
	<link rel="stylesheet" href="giao-dien/css/main.css">
</head>

<body class="goto-here">
	<div class="py-1 bg-primary">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text">+84 12345678</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text">team8drink@email.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<?php if (isset($_SESSION['login_member'])) : ?>
								<span class="text">Chào mừng <b><?php echo $_SESSION['login_member'] ?></b> đến với chúng tôi</span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?= ROOT ?>">Team8Drink</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="<?= ROOT ?>" class="nav-link">Trang chủ</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<?php foreach ($cate as $ca) : ?>
								<a class="dropdown-item" href="<?= ROOT ?>?page=danh_muc&&id_dm=<?= $ca['id'] ?>"><?= $ca['cat_name'] ?></a>
							<?php endforeach; ?>
						</div>
					</li>
					<li class="nav-item"><a href="<?= ROOT ?>?page=about" class="nav-link">Về chúng tôi</a></li>
					<li class="nav-item"><a href="<?= ROOT ?>?page=blog" class="nav-link">Tin tức</a></li>
					<li class="nav-item"><a href="<?= ROOT ?>?page=contact" class="nav-link">Liên hệ</a></li>
					<?php
					$numCart =0;
					if(isset($_SESSION["cart"])){
						foreach($_SESSION["cart"] as $key => $value){
							$numCart ++;
						}
					}
					?>
					<li class="nav-item cta cta-colored"><a href="<?= ROOT ?>?page=cart" class="nav-link"><span class="icon-shopping_cart numCart"><?php echo $numCart ?></span></a></li>
					<li class="nav-item cta cta-colored"><a href="<?= ROOT ?>?page=login" class="nav-link"><span class="icon-user"></span></a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->