<?php
$form = isset($_GET['form']) ? $_GET['form'] : '';
extract($_REQUEST);
if(isset($_POST['gio_hang'])){
    if(isset($_SESSION['member']) && count($_SESSION['cart'])>0){
            $member_id = $_SESSION['member']['id'];
            $nguoi_nhan = $nguoi_nhan;
            $sdt = $sdt;
            $dia_chi = $dia_chi;
            $tong_tien = $total;
            $tinh_trang = 1;
        insert_cart(
            $member_id,
            $nguoi_nhan,
            $sdt,
            $dia_chi,
            $tong_tien,
            $tinh_trang
        );
        $cart = list_cart_member($_SESSION['member']['id']);
        if(count($cart)>0){
            foreach($_SESSION['cart'] as $gio){
                $cart_id = $cart[0]['id'];
                $ten_san_pham = $gio['prd_name'];
                $don_gia = $gio['prd_price'];
                $so_luong = $gio['num'];
                $thanh_tien = $gio['prd_price']*$gio['num'];
                insert_cart_detail(
                    $cart_id,
                    $ten_san_pham,
                    $don_gia,
                    $so_luong,
                    $thanh_tien
                );
                
            };
            unset($_SESSION['cart']);
        };
        
        header("location: " . $_SERVER['REQUEST_URI']);
        
        
    };
}

?>

    <main>
        <div class="pb-5 ">
            <div class="container card" id="listCart">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <!-- Shopping cart table -->
                        <form action="" method="POST">
                        <div class="table-responsive">
                            <table class="table" id="carts">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Amount</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Note</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                               <?php
                               $total =0;
                                     if(isset($_SESSION["cart"])){
                                        
                                         foreach($_SESSION["cart"] as $key => $value){
                                ?>
                                <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="images/<?php echo $value["prd_image"]?>" alt="" class="img-sp rounded shadow-sm">
                                                <div style="max-width: 30%;" class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $value["prd_name"]?></a></h5>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle">
                                            <span id="price">
                                                <?php echo $value["prd_price"]?>
                                                <input type="hidden" name="don_gia" value="<?=$value["prd_price"]?>">
                                            </span>
                                        </td>
                                        <td class="align-middle"><input onchange="updateSl(<?php echo $key?>)" id="sl_<?php echo $key?>" type="number"  name="sl_<?php echo $key?>" id="" value="<?php echo $value["num"]?>"></td>
                                        <td class="align-middle">
                                            <?php echo $total = $value["prd_price"] *$value["num"] ; $total+=$total ?>
                                        </td>
                                        <td class="border-0 align-middle"><button onclick="deleteCart(<?php echo $key?>)"><i  id="trash" class="icon-trash text-danger"></i></button></td>
                                    </tr>
                                
                                <?php
                                 }   }else{
                                     echo "Bạn chưa mua hàng";
                                 }
                                ?>
                                </tbody>
                                <thead>
                                  
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Total</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase" id="total-price"><?php echo $total;  ?></div>
                                            <input type="hidden" name="total" value="<?=$total?>">
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="border-0 bg-light"></th>
                                        <th class="border-0 bg-light"></th>
                                        <th class="border-0 bg-light"></th>
                                        <th scope="col" class="border-0 bg-light">
                                           
                                                <div class="py-2 text-uppercase"> <a href="<?=ROOT?>?page=cart&&form=thongtin" class="btn btn-block btn-dark">Điền thông tin</a></div>
                                            
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase"><button class="btn btn-block btn-dark" id="capnhatgh">Hủy đơn hàng</button></div>
                                        </th>
                                    </tr>
                                </tfoot>
                                
                            </table>
                           
                        </div>
                        <?php if($form=='thongtin'):?>
                        <div>
                            <h4>Vui lòng nhập thông tin trước khi ấn thanh toán</h4>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa chỉ giao hàng</label>
                                <input type="text" name="dia_chi" class="form-control" id="exampleInputPassword1" placeholder="Nhập địa chỉ giao hàng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên người nhận</label>
                                <input type="text" name="nguoi_nhan"  class="form-control" id="exampleInputPassword1" placeholder="Nhập tên người nhận">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại người nhận</label>
                                <input type="number" name="sdt" class="form-control" id="exampleInputPassword1" placeholder="Nhập số điện thoại người nhận">
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="row btn-shopping">
                                <div class="col-sm-12  col-md-6">
                                   
                                    <button class="btn btn-block btn-dark continue-sp"> <a href="<?=ROOT?>?page=home">Continue Shopping</a></button>
                                    
                                </div>
                                <div class="col-sm-12 col-md-6 text-right">
                                    <button name="gio_hang" class="btn btn-lg btn-block btn-success text-uppercase checkout">Mua hàng</button>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <div></div>
                        <?php endif;?>
                        </form>
                        <!-- End -->
                    </div>
                </div>
    </main>
