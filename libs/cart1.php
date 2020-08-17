<!-- <?php
require_once "database.php";
// Thêm id sản phẩm vào trong session 
/*function id_to_session($id){
    if(!isset($_SESSION['gio_hang'])){
        $stack = array();
    }else{
        $stack = $_SESSION['gio_hang'];
    }
    $so = $_POST['id'];
    // foreach($stack as $tk){
        // if ($so = $tk) {
        // break;
        // } else {
           
        // }
        // 
    // }
    // 
    if(in_array($so,$stack,true)){
      header("location: " . $_SERVER['REQUEST_URI']);
      
    }else{
        array_push($stack,$so);
        $_SESSION['gio_hang'] = $stack;
    }
 
 

}


// hiển thị sản phẩm đã chon ở trong giỏ hàng
function list_product_cart(){
        $sql = "SELECT trademark.id as trid, product.id as proid, prd_image,prd_name,prd_price,trade_name
        FROM product INNER JOIN trademark ON product.trade_id = trademark.id WHERE ";
        foreach ($_SESSION['gio_hang'] as $value) {
            $sql .= "product.id=$value or ";
        }
        
        $sql = rtrim($sql, " or ");
        // echo $sql;
        return query_pro($sql);
}
*/

// thêm giỏ hàng
function insert_cart(
    $member_id,
    $nguoi_nhan,
    $sdt,
    $dia_chi,
    $tong_tien,
    $tinh_trang
){
    $create_at =  date("Y-m-d H:i:s");
    $data = [
        'member_id' => $member_id,
        'nguoi_nhan' => $nguoi_nhan,
        'sdt' => $sdt,
        'dia_chi' => $dia_chi,
        'tong_tien' => $tong_tien,
        'tinh_trang' => $tinh_trang,
        'ngay_dat' => $create_at
    ];
    return insert("cart", $data);
}




// thêm bảng chi tiết sản phẩm
function insert_cart_detail(
    $cart_id,
    $ten_san_pham,
    $don_gia,
    $so_luong,
    $thanh_tien
){
    $create_at =  date("Y-m-d H:i:s");
    $data = [
        'cart_id' => $cart_id,
        'ten_san_pham' => $ten_san_pham,
        'don_gia' => $don_gia,
        'so_luong' => $so_luong,
        'thanh_tien' => $thanh_tien,
        'ngay_them' => $create_at
    ];
    return insert("cart_detail", $data);
}




// lấy ra giỏ hàng theo id của member
function list_cart_member($id_member){
    $sql = "SELECT *  FROM cart WHERE member_id=$id_member ORDER BY ngay_dat DESC LIMIT 0,1"; 
    return query_pro($sql);
}




// list all sản phẩm theo tình trạng đơn hàng 
function list_all_cart2($tinh_trang){
    $sql = "SELECT cart.id as caID, cart_detail.id as cadeID, member.id as meID,nguoi_nhan,sdt,dia_chi,tong_tien,tinh_trang,ngay_dat,ten_san_pham,don_gia,so_luong,thanh_tien, ngay_them ,member_name 
                    FROM cart INNER JOIN cart_detail on cart.id = cart_detail.cart_id
                                INNER JOIN member on cart.member_id = member.id
      WHERE tinh_trang=$tinh_trang ORDER BY ngay_dat DESC"; 
    return query_pro($sql);
}
function list_all_cart($tinh_trang){
    $sql = "SELECT cart.id as caID, member.id as meID,nguoi_nhan,sdt,dia_chi,tong_tien,tinh_trang,ngay_dat,member_name 
                    FROM cart INNER JOIN member on cart.member_id = member.id
      WHERE tinh_trang=$tinh_trang ORDER BY ngay_dat DESC"; 
    return query_pro($sql);
}



// hàm update tình trạng
function update_tinh_trang($id, $tinh_trang){
    $sql = "UPDATE cart SET tinh_trang=$tinh_trang WHERE id=$id"; 
    return query_pro($sql);
}



// Lấy hêt bảng chi tiết sản phẩm
function list_all_ct($id_cart){
    $sql = "SELECT * FROM cart_detail WHERE cart_id=$id_cart" ; 
    return query_pro($sql);
}
?> -->



