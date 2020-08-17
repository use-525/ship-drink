<?php

$sp = tim_kiem($_SESSION['tim_kiem']);


?>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản phẩm có từ khóa</span>
                <h2 class="mb-4"><?php echo $_SESSION['tim_kiem']?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php foreach($sp as $sp):?>
            <div class="col-md-6 col-lg-2 ftco-animate">
    				<div class="product">
    					<a href="<?=ROOT?>?page=san_pham&&id_sp=<?=$sp['proid']?>" class="img-prod"><img class="img-fluid" src="images/<?=$sp['prd_image']?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="<?=ROOT?>?page=san_pham&&id_sp=<?=$sp['proid']?>"><?=$sp['prd_name']?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
									<p><?=$sp['trade_name']?></p>
		    						<p class="price"><span class="price-sale"><?=$sp['prd_price']?> VNĐ</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                <?php endforeach;?>
        </div>
    </div>
</section>
