<?php
extract($_REQUEST);
$id = $_GET['id_sp'];

$sp_one = list_one_product('id', $id);
// $thuong_hieu = list_one_trademark('id',$sp_one['trade_id']);
$sp_lq = lk_2($sp_one['cat_id']);
// $binh_luan = list_all_comment_sp('prd_id', $id);

if (isset($_POST['btnSend'])) {
    insert_comment($id,$_SESSION['member']['id'], $content,1);
    header("location: " . $_SERVER['REQUEST_URI']);
    die;
}
$ccc = list_all_comment();
?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread"><?= $sp_one['prd_name'] ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate" style="text-align:center;">
                <a href="" class="image-popup"><img src="images/<?= $sp_one['prd_image'] ?>" class="img-fluid" alt="Colorlib Template" width="300" height="300"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $sp_one['prd_name'] ?></h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <p class="price"><span><?= $sp_one['prd_price'] ?> VNĐ</span></p>
                <p><?= $sp_one['prd_detail'] ?>

                </p>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="" id="" class="form-control">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Extra Large</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="num" name="num" class="form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                    <div class="w-100"></div>



                </div>
             
            
				<!-- <input type="hidden" value="<?php echo  $_GET['id_sp']; ?>" name='id'> -->
			<button data-toggle="modal" data-target="#exampleModal" type="submit" onclick="addCart(<?php echo  $_GET['id_sp']; ?>)" style="width:100%;" name="them_gio_hang" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        Add to card
					</button>
			
                   
            
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-8 ftco-animate">



            <div id="comment" class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Bình luận sản phẩm</h3>
                    <?php if (isset($_SESSION['member'])) : ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Nội dung:</label>
                                <textarea name="content" required rows="8" class="form-control"></textarea>
                            </div>
                            <button type="submit" name="btnSend" class="btn btn-primary">Gửi</button>
                        </form>
                    <?php else : ?>
                        <p>Bạn cần đăng nhập để bình luận!</p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- sdsdsd -->
            <div class="pt-5 mt-5">
                <h3 class="mb-5"><?=count($ccc)?> Comments</h3>
                <ul class="comment-list">

                    <!-- <li class="comment">
                        <div class="vcard bio">
                            <img src="images/person_1.jpg" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>John Doe</h3>
                            <div class="meta">June 27, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply">Reply</a></p>
                        </div>

                        <ul class="children">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                </div>
                            </li>
                        </ul>
                    </li> -->
                    <?php $comment_pro = list_comment_product($id);   ?>
                    <?php foreach ($comment_pro as $cc) : ?>
                        <?php if ($cc['comment_level'] == true) : ?>
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3><?= $cc['member_name'] ?></h3>
                                    <div class="meta"><?= $cc['created_comment'] ?></div>
                                    <p><?= $cc['content'] ?></p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="comment"></li>
                        <?php endif; ?>
                    <?php endforeach; ?>


                </ul>
                <!-- END comment-list -->
                <!--               
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div> -->
            </div>
        </div> <!-- .col-md-8 -->

    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản phẩm</span>
                <h2 class="mb-4">Sản phẩm liên quan</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($sp_lq as $sp) : ?>
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
                                    <p class="price"><span class="price-sale"><?= $sp['prd_price'] ?> VNĐ</span></p>
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
            <?php endforeach; ?>
        </div>
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

</section>
