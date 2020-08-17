<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 ftco-animate text-center">
						<h1 class="mb-2">Chúng tôi phục vụ đồ uống và &amp; Đồ ăn</h1>
						<h2 class="subheading mb-4">Chúng tôi giao đồ uống và &amp; đồ ăn</h2>
						<p><a href="#" class="btn btn-primary">Khám phá ngay</a></p>
					</div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-sm-12 ftco-animate text-center">
						<h1 class="mb-2">100% sạch &amp; và đảm bảo</h1>
						<h2 class="subheading mb-4">Chúng tôi giao đồ uống và &amp; đồ ăn</h2>
						<p><a href="#" class="btn btn-primary">Khám phá ngay</a></p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row no-gutters ftco-services">
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-shipped"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Miễn phí vẫn chuyển</h3>
						<span>Những đơn hàng từ 100k</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-diet"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Giao hàng nhanh</h3>
						<span>Thời gian giao hàng từ 5p-15p</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-award"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Chất lượng cao</h3>
						<span>Chất lượng đồ uống luôn được đảm bảo</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
					<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
						<span class="flaticon-customer-service"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Hỗ trợ</h3>
						<span>Hỗ trợ 24/7</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Sản phẩm của chúng tôi</span>
				<h2 class="mb-4">Đồ uống được xem nhiều</h2>
				<p>một vài đồ uống được khách hàng ưu thích</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($sp_lx as $sp) : ?>
				<div class="col-md-6 col-lg-2 ftco-animate">
					<div class="product">
						<a href="<?= ROOT ?>?page=san_pham&&id_sp=<?= $sp['proid'] ?>" class="img-prod"><img class="img-fluid" src="images/<?= $sp['prd_image'] ?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="<?= ROOT ?>?page=san_pham&&id_sp=<?= $sp['proid'] ?>"><?= $sp['prd_name'] ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p><?= $sp['trade_name'] ?></p>
									<?php if ($sp['pro_sale'] > 0 && $sp['pro_sale'] < 1) : ?>
										<p class="price" style="color:red;"><span style="color:coral" class="price-sale">KM: <?= $sp['prd_price']*$sp['pro_sale']  ?> VNĐ</span></p>
									<?php else : ?>
										<p class="price"><span class="price-sale"><?= $sp['prd_price'] ?> VNĐ</span></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<!-- <form action="" method="POST"> -->
										<input type="hidden" value="<?= $sp['proid'] ?>" name='id'>
										<input type="hidden" id="num" name="num" class="form-control input-number" value="1" >
										<button data-toggle="modal" data-target="#exampleModal" type="submit" onclick="addCart(<?php echo  $sp['proid']; ?>)" name="" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</button>
									<!-- </form> -->
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
				<span class="subheading">Giá tốt nhất cho bạn</span>
				<h2 class="mb-4">Ưu đãi trong ngày</h2>
				<?php foreach ($giam_gia as $gg) : ?>
					<?php if ($gg['pro_name'] != 'Không') : ?>
						<span class="price"><a href="#"><?= $gg['pro_name'] ?></a></span><br>
					<?php endif; ?>
				<?php endforeach; ?>
				<div id="timer" class="d-flex mt-5">
					<div class="time" id="days"></div>
					<div class="time pl-3" id="hours"></div>
					<div class="time pl-3" id="minutes"></div>
					<div class="time pl-3" id="seconds"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Đồ uống mới</span>
				<h2 class="mb-4">Sản phẩm mới cập nhật</h2>
				<p>một vài đồ uống được các thương hiệu mới cập nhật</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($sp_new as $sp) : ?>
				<div class="col-md-6 col-lg-2 ftco-animate">
					<div class="product">
						<a href="<?= ROOT ?>?$page=san_pham&&id_sp=<?= $sp['proid'] ?>" class="img-prod"><img class="img-fluid" src="images/<?= $sp['prd_image'] ?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="<?= ROOT ?>?$page=san_pham&&id_sp=<?= $sp['proid'] ?>"><?= $sp['prd_name'] ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p><?= $sp['trade_name'] ?></p>
									<?php if ($sp['pro_sale'] > 0 && $sp['pro_sale'] < 1) : ?>
										<p class="price" style="color:red;"><span  style="color:coral" class="price-sale">KM: <?= $sp['prd_price']*$sp['pro_sale']  ?> VNĐ</span></p>
									<?php else : ?>
										<p class="price"><span class="price-sale"><?= $sp['prd_price'] ?> VNĐ</span></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<input type="hidden" value="<?= $sp['proid'] ?>" name='id'>
										<input type="hidden" id="num" name="num" class="form-control input-number" value="1" >
										<button data-toggle="modal" data-target="#exampleModal" type="submit" onclick="addCart(<?php echo  $sp['proid']; ?>)" name="" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</button>
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Giám độc điều hành</span>
				<h2 class="mb-4">Ba giám đốc phát triển công ty</h2>
				<p></p>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text text-center">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Nguyễn Tấn Cường</p>
								<span class="position">Marketing Manager</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text text-center">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Nguyễn Duy Thái</p>
								<span class="position">Interface Designer</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text text-center">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Tạ Ngọc Ninh</p>
								<span class="position">UI Designer</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<hr>


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Giảm giá</span>
				<h2 class="mb-4">Sản phẩm đang được giảm giá</h2>
				<p>Đồ uống đang được giảm giá mua ngay để nhận được ưu đãi</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($sp_new as $sp) : ?>
				<div class="col-md-6 col-lg-2 ftco-animate">
					<div class="product">
						<a href="<?= ROOT ?>?$page=san_pham&&id_sp=<?= $sp['proid'] ?>" class="img-prod"><img class="img-fluid" src="images/<?= $sp['prd_image'] ?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="<?= ROOT ?>?$page=san_pham&&id_sp=<?= $sp['proid'] ?>"><?= $sp['prd_name'] ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p><?= $sp['trade_name'] ?></p>
									<?php if ($sp['pro_sale'] > 0 && $sp['pro_sale'] < 1) : ?>
										<p class="price" style="color:red;"><span  style="color:coral" class="price-sale">KM:<?= $sp['prd_price']*$sp['pro_sale']  ?> VNĐ</span></p>
									<?php else : ?>
										<p class="price"><span class="price-sale"><?= $sp['prd_price'] ?> VNĐ</span></p>
									<?php endif; ?>
									
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<!-- <form action="" method="POST"> -->
									<input type="hidden" value="<?= $sp['proid'] ?>" name='id'>
										<input type="hidden" id="num" name="num" class="form-control input-number" value="1" >
										<button data-toggle="modal" data-target="#exampleModal" type="submit" onclick="addCart(<?php echo  $sp['proid']; ?>)" name="" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</button>
									<!-- </form> -->
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>