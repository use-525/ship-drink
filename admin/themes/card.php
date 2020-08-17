<?php
$tt = isset($_GET['tt']) ? $_GET['tt'] : "";

extract($_REQUEST);
if(isset($_POST['huy'])){
    update_tinh_trang($id,0);
    header("location: " . $_SERVER['REQUEST_URI']);
}
if(isset($_POST['duyet'])){
    update_tinh_trang($id,2);
    header("location: " . $_SERVER['REQUEST_URI']);
}
if(isset($_POST['xn'])){
    update_tinh_trang($id,3);
    header("location: " . $_SERVER['REQUEST_URI']);
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

    <!--Icons-->
    <script src="themes/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
    <style>
        .doituong{
            display: none;
        }
    </style>
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
                <a class="navbar-brand" href="#"><span><span>Team8Drink </span></a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="<?= ROOT ?>admin/?page=login"><svg class="glyph stroked cancel">
                                <use xlink:href="#stroked-cancel"></use>
                            </svg> Đăng xuất</a>
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
                <li class="active">Quản lý giỏ hàng</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý giỏ hàng</h1>
            </div>
        </div>
        <!--/.row-->
        <div id="toolbar" class="btn-group">
            <a href="<?= ROOT ?>admin/?page=card&&tt=c" class="btn btn-success bg-danger">
                <i class="glyphicon glyphicon-plus"></i> Đơn hàng chờ xác nhận
            </a>
            <a href="<?= ROOT ?>admin/?page=card&&tt=xd" class="btn btn-success bg-warning">
                <i class="glyphicon glyphicon-plus"></i> Đơn hàng đã xác nhận
            </a>
            <a href="<?= ROOT ?>admin/?page=card&&tt=ht" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Đơn hàng đã hoàn thành
            </a>
            <a href="<?= ROOT ?>admin/?page=card&&tt=h" class="btn btn-success bg-danger">
                <i class="glyphicon glyphicon-plus"></i> Đơn hàng đã huỷ
            </a>
        </div>
        <?php if($tt=='' or $tt=='c'):?>
            <?php $list_all_cart = list_all_cart(1);?>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table">

                            <thead>
                                <tr>
                                    <th style="text-align:center;"></th>
                                    <th style="text-align:center;">Mã đơn hàng</th>
                                    <th style="text-align:center;">Tài khoản</th>
                                    <th style="text-align:center;">Người nhận</th>
                                    <th style="text-align:center;">Điạ chỉ</th>
                                    <th style="text-align:center;">Số điện thoại</th>
                                    <th style="text-align:center;">Giá đơn hàng</th>
                                    <th style="text-align:center;">Ngày đặt hàng</th>
                                    <th style="text-align:center;">Tình trạng</th>
                                </tr>
                            </thead>
                            <?php foreach($list_all_cart as $cart):?>
                            
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;"><button class="an">+</button></td>
                                        <td style="text-align:center;"><?=$cart['caID']?></td>
                                        <td style="text-align:center;"><?=$cart['member_name']?></td>
                                        <td style="text-align:center;"><?=$cart['nguoi_nhan']?></td>
                                        <td style="text-align:center;"><?=$cart['dia_chi']?></td>
                                        <td style="text-align:center;"><?=$cart['sdt']?></td>
                                        <td style="text-align:center;"><?=$cart['tong_tien']?></td>
                                        <td style="text-align:center;"><?=$cart['ngay_dat']?></td>
                                        <td style="text-align:center;">Đang chờ được duyệt</td>
                                        <td style="text-align:center;">
                                            <form action="" method="POST">
                                                <input type="hidden" value="<?=$cart['caID']?>" name="id">
                                                <button type="submit" name="huy">Huỷ</button>
                                                <button type="submit" name="duyet">Duyệt</button>
                                            </form>
                                        </td>
                                    </tr>
                                        
                                                        <tr class="doituong">
                                                            <th style="text-align:center;">Tên sản phẩm</th>
                                                            <th style="text-align:center;">Đơn giá</th>
                                                            <th style="text-align:center;">Số lượng</th>
                                                            <th style="text-align:center;">Thành tiền</th>
                                                        </tr>
                                            
                                                <?php $list_all_ct =  list_all_ct($cart['caID'])?>
                                            <?php foreach($list_all_ct as $ct):?>
                                                
                                                <tr class="doituong">
                                                    <td style="text-align:center;"><?=$ct['ten_san_pham']?></td>
                                                    <td style="text-align:center;"><?=$ct['don_gia']?></td>
                                                    <td style="text-align:center;"><?=$ct['so_luong']?></td>
                                                    <td style="text-align:center;"><?=$ct['thanh_tien']?></td>
                                                  
                                            <?php endforeach;?>
                                       
                                </tbody>
                            
                           
                            <?php endforeach;?>
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
        <?php elseif($tt=='xd'):?>
            <?php $list_all_cart = list_all_cart(2);?>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table">

                            <thead>
                                <tr>
                                    <th style="text-align:center;"></th>
                                    <th style="text-align:center;">Mã đơn hàng</th>
                                    <th style="text-align:center;">Tài khoản</th>
                                    <th style="text-align:center;">Người nhận</th>
                                    <th style="text-align:center;">Điạ chỉ</th>
                                    <th style="text-align:center;">Số điện thoại</th>
                                    <th style="text-align:center;">Giá đơn hàng</th>
                                    <th style="text-align:center;">Ngày đặt hàng</th>
                                    <th style="text-align:center;">Tình trạng</th>
                                </tr>
                            </thead>
                            <?php foreach($list_all_cart as $cart):?>
                            
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;"><button class="an">+</button></td>
                                        <td style="text-align:center;"><?=$cart['caID']?></td>
                                        <td style="text-align:center;"><?=$cart['member_name']?></td>
                                        <td style="text-align:center;"><?=$cart['nguoi_nhan']?></td>
                                        <td style="text-align:center;"><?=$cart['dia_chi']?></td>
                                        <td style="text-align:center;"><?=$cart['sdt']?></td>
                                        <td style="text-align:center;"><?=$cart['tong_tien']?></td>
                                        <td style="text-align:center;"><?=$cart['ngay_dat']?></td>
                                        <td style="text-align:center;">Đang chờ được giao</td>
                                        <td style="text-align:center;">
                                            <form action="" method="POST">
                                                <input type="hidden" value="<?=$cart['caID']?>" name="id">
                                                <button type="submit" name="huy">Huỷ</button>
                                                <button type="submit" name="xn">Xác nhận đã giao</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr class="doituong">
                                    <th style="text-align:center;">Tên sản phẩm</th>
                                                            <th style="text-align:center;">Đơn giá</th>
                                                            <th style="text-align:center;">Số lượng</th>
                                                            <th style="text-align:center;">Thành tiền</th>
                                                        </tr>
                                            
                                                <?php $list_all_ct =  list_all_ct($cart['caID'])?>
                                            <?php foreach($list_all_ct as $ct):?>
                                                
                                                <tr class="doituong">
                                                    <td style="text-align:center;"><?=$ct['ten_san_pham']?></td>
                                                    <td style="text-align:center;"><?=$ct['don_gia']?></td>
                                                    <td style="text-align:center;"><?=$ct['so_luong']?></td>
                                                    <td style="text-align:center;"><?=$ct['thanh_tien']?></td>
                                                  
                                            <?php endforeach;?>
                                       
                                </tbody>
                            
                           
                            <?php endforeach;?>
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
        <?php elseif($tt=='ht'):?>
            <?php $list_all_cart = list_all_cart(3);?>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table">

                            <thead>
                                <tr>
                                    <th style="text-align:center;"></th>
                                    <th style="text-align:center;">Mã đơn hàng</th>
                                    <th style="text-align:center;">Tài khoản</th>
                                    <th style="text-align:center;">Người nhận</th>
                                    <th style="text-align:center;">Điạ chỉ</th>
                                    <th style="text-align:center;">Số điện thoại</th>
                                    <th style="text-align:center;">Giá đơn hàng</th>
                                    <th style="text-align:center;">Ngày đặt hàng</th>
                                    <th style="text-align:center;">Tình trạng</th>
                                </tr>
                            </thead>
                            <?php foreach($list_all_cart as $cart):?>
                            
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;"><button class="an">+</button></td>
                                        <td style="text-align:center;"><?=$cart['caID']?></td>
                                        <td style="text-align:center;"><?=$cart['member_name']?></td>
                                        <td style="text-align:center;"><?=$cart['nguoi_nhan']?></td>
                                        <td style="text-align:center;"><?=$cart['dia_chi']?></td>
                                        <td style="text-align:center;"><?=$cart['sdt']?></td>
                                        <td style="text-align:center;"><?=$cart['tong_tien']?></td>
                                        <td style="text-align:center;"><?=$cart['ngay_dat']?></td>
                                        <td style="text-align:center;">Đơn đã được giao</td>
                                        <td style="text-align:center;">
                                        </td>
                                    </tr>
                                        
                                                        <tr class="doituong">
                                                            <th style="text-align:center;">Tên sản phẩm</th>
                                                            <th style="text-align:center;">Đơn giá</th>
                                                            <th style="text-align:center;">Số lượng</th>
                                                            <th style="text-align:center;">Thành tiền</th>
                                                        </tr>
                                            
                                                <?php $list_all_ct =  list_all_ct($cart['caID'])?>
                                            <?php foreach($list_all_ct as $ct):?>
                                                
                                                <tr class="doituong">
                                                    <td style="text-align:center;"><?=$ct['ten_san_pham']?></td>
                                                    <td style="text-align:center;"><?=$ct['don_gia']?></td>
                                                    <td style="text-align:center;"><?=$ct['so_luong']?></td>
                                                    <td style="text-align:center;"><?=$ct['thanh_tien']?></td>
                                                  
                                            <?php endforeach;?>
                                       
                                </tbody>
                            
                           
                            <?php endforeach;?>
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
        <?php elseif($tt=='h'):?>
            <?php $list_all_cart = list_all_cart(0);?>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table" class="table">

                            <thead>
                                <tr>
                                    <th style="text-align:center;"></th>
                                    <th style="text-align:center;">Mã đơn hàng</th>
                                    <th style="text-align:center;">Tài khoản</th>
                                    <th style="text-align:center;">Người nhận</th>
                                    <th style="text-align:center;">Điạ chỉ</th>
                                    <th style="text-align:center;">Số điện thoại</th>
                                    <th style="text-align:center;">Giá đơn hàng</th>
                                    <th style="text-align:center;">Ngày đặt hàng</th>
                                    <th style="text-align:center;">Tình trạng</th>
                                </tr>
                            </thead>
                            <?php foreach($list_all_cart as $cart):?>
                            
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;"><button class="an">+</button></td>
                                        <td style="text-align:center;"><?=$cart['caID']?></td>
                                        <td style="text-align:center;"><?=$cart['member_name']?></td>
                                        <td style="text-align:center;"><?=$cart['nguoi_nhan']?></td>
                                        <td style="text-align:center;"><?=$cart['dia_chi']?></td>
                                        <td style="text-align:center;"><?=$cart['sdt']?></td>
                                        <td style="text-align:center;"><?=$cart['tong_tien']?></td>
                                        <td style="text-align:center;"><?=$cart['ngay_dat']?></td>
                                        <td style="text-align:center;">Đơn đã huỷ</td>
                                        <td style="text-align:center;">
                                        </td>
                                    </tr>
                                        
                                                        <tr class="doituong">
                                                            <th style="text-align:center;">Tên sản phẩm</th>
                                                            <th style="text-align:center;">Đơn giá</th>
                                                            <th style="text-align:center;">Số lượng</th>
                                                            <th style="text-align:center;">Thành tiền</th>
                                                        </tr>
                                            
                                                <?php $list_all_ct =  list_all_ct($cart['caID'])?>
                                            <?php foreach($list_all_ct as $ct):?>
                                                
                                                <tr class="doituong">
                                                    <td style="text-align:center;"><?=$ct['ten_san_pham']?></td>
                                                    <td style="text-align:center;"><?=$ct['don_gia']?></td>
                                                    <td style="text-align:center;"><?=$ct['so_luong']?></td>
                                                    <td style="text-align:center;"><?=$ct['thanh_tien']?></td>
                                                  
                                            <?php endforeach;?>
                                       
                                </tbody>
                            
                           
                            <?php endforeach;?>
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
        <?php endif;?>    







        <!--/.row-->
    </div>
    <!--/.main-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script>
        $(document).ready(function(){
            $(".an").click(function(){
                $(".doituong").toggle(500);
            });
        });
        
    </script>
</body>

</html>