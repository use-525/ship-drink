<?php
    $id_cat = $_GET['id_dm'];
	$list_sp = lk_2($id_cat);
	$dm = list_one_category('id', $id_cat);
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Sản phẩm</span></p>
            <h1 class="mb-0 bread"><?=$dm['cat_name']?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
                        <div class="name"><p></p></div>
    					
    					
    					
    					
    				</ul>
    			</div>
    		</div>
    		<div class="row">
			<?php foreach($list_sp as $sp):?>
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
				<?php endforeach;?>
				</div>







<div class="modal fade" id="exampleModal" id="showTb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     BẠN THÊM SẢN PHẨM THÀNH CÔNG
      </div>
      <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      <!-- </div> -->
    </div>
  </div>
</div>

		</div>
    </section>
