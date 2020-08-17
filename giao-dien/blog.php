<?php
$new_blog = list_all_news();
$category = list_all_category();
$trademark = list_all_trademark();
?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang Chủ</a></span> <span>Trang Tin Tức</span></p>
                <h1 class="mb-0 bread">Trang Tin Tức</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <div class="row">
                    <?php foreach ($new_blog as $n) : ?>
                        <div class="col-md-12 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch d-md-flex">
                                <a class="blog-img mr-4" href="<?= ROOT ?>?page=blog-single&&id=<?=$n['id']?>">
                                    <img src="./images/<?= $n['news_image'] ?>" alt="" height="200" width="180">
                                </a>
                                <div class="text d-block pl-md-4">
                                    <div class="meta mb-3">
                                        <!-- <div><a href="#"><?= $n['news_created_at'] ?></a></div> -->
                                        <div><a href="#">Admin</a></div>
                                        <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                    </div>
                                    <h3 class="heading"><a href="#"><?= $n['news_title'] ?></a></h3>
                                    <p><?= $n['news_content'] ?></p>
                                    <p><a href="<?= ROOT ?>?page=blog-single&&id=<?=$n['id']?>" class="btn btn-primary py-2 px-3">Xem thêm</a></p>
                                </div>
                            </div>


                        </div>
                    <?php endforeach; ?>
                </div>
            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Danh Mục sản phẩm</h3>
                    <ul class="categories">
                        <?php foreach ($category as $c) : ?>
                            <li><a href="<?=ROOT?>?page=danh_muc&&id_dm=<?=$c['id']?>"><?= $c['cat_name'] ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Một số bài viết gần đây</h3>
                    <?php foreach ($new_blog as $n) : ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4">
                                <img src="./images/<?= $n['news_image'] ?>" alt="" height="100" width="80">
                            </a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#"><?= $n['news_title'] ?></a></h3>
                                <div class="meta">
                                    <!-- <div><a href="#"><span class="icon-calendar"></span><?= $n['news_created_at'] ?></a></div> -->
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Một số nhãn hiệu</h3>
                    <div class="tagcloud">
                        <?php foreach ($trademark as $t) : ?>
                            <a href="#" class="tag-cloud-link"><?= $t['trade_name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->