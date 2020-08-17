<?php
require_once "database.php";

// The function takes all data of a table
function list_all_product()
{
    return listAll("product");
}
// The function takes a data of a table
function list_one_product($id, $value)
{
    return listOne("product", $id, $value);
}
// Add data to the table
function insert_product(
    $prd_name,
    $cat_id,
    $prd_image,
    $prd_price,
    $prd_warranty,
    $prd_accessory,
    $prd_featured,
    $prd_status,
    $prd_detail,
    $prd_view,
    $link_video,
    $pro_id,
    $trade_id
) {
    $create_at =  date("Y-m-d H:i:s");
    $data = [
        'prd_name' => $prd_name,
        'cat_id' => $cat_id,
        'prd_image' => $prd_image,
        'prd_price' => $prd_price,
        'prd_warranty' => $prd_warranty,
        'prd_accessory' => $prd_accessory,
        'prd_featured' => $prd_featured,
        'prd_status' => $prd_status,
        'prd_detail' => $prd_detail,
        'prd_view' => $prd_view,
        'prd_created_at' => $create_at,
        'prd_updated_at' => $create_at,
        'link_video' => $link_video,
        'pro_id' => $pro_id,
        'trade_id' => $trade_id
    ];
    return insert("product", $data);
}
// Update data to the table
function update_product(
    $prd_name,
    $cat_id,
    $prd_image,
    $prd_price,
    $prd_warranty,
    $prd_accessory,
    $prd_featured,
    $prd_status,
    $prd_detail,
    $prd_view,
    $link_video,
    $pro_id,
    $trade_id,
    $id
) {
    $update_at = date("Y-m-d H:i:s");
    $data = [
        'prd_name' => $prd_name,
        'cat_id' => $cat_id,
        'prd_image' => $prd_image,
        'prd_price' => $prd_price,
        'prd_warranty' => $prd_warranty,
        'prd_accessory' => $prd_accessory,
        'prd_featured' => $prd_featured,
        'prd_status' => $prd_status,
        'prd_detail' => $prd_detail,
        'prd_view' => $prd_view,
        'prd_updated_at' => $update_at,
        'link_video' => $link_video,
        'pro_id' => $pro_id,
        'trade_id' => $trade_id
    ];
    return update("product", $data, "id", $id);
}
// Delete data to the table
function delete_product($id)
{
    return delete("product", "id", $id);
}
//hien thi danh sach san pham co han che
function list_limit_product($index)
{
    $sql = "SELECT *FROM product LIMIT $index,5";
    return query_pro($sql);
}

function list_sale_product()
{
    $arr = ['khuyen_mai', '>', 0];
    return query_where("product", $arr);
}
// chuc nang dem phan trang
function patigation()
{
    $sql = "SELECT count(id) as number from product group by id";
    return query_pro($sql);
}
//ham cap nhap luong view, so luong luot xem
function update_view_product($id)
{
    $sql = "UPDATE product SET luot_xem=luot_xem+1 WHERE id=$id";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
//
function product_inner_join($id)
{
    $sql = "SELECT
    product.id AS id,
    product.cat_id,
    prd_name,
    prd_price,
    prd_image,
    prd_status,
    link_video,
    product.pro_id,
    product.trade_id,
    prd_view
FROM
    (((
        product
    INNER JOIN category ON product.cat_id = category.id)
    INNER JOIN promotion ON product.pro_id = promotion.id)
    INNER JOIN trademark ON product.trade_id = trademark.id
    )
WHERE
    promotion.id = $id AND category.id = $id
             ";

    return query_pro($sql);
}
//
function product_cate($id)
{
    $sql = "SELECT
    product.id as id,
    cat_name,
    prd_name,
    prd_price,
    prd_image,
    prd_status,
    link_video,
    pro_name,
    trade_name,
    prd_view
FROM
    (((
        product
    INNER JOIN category ON product.cat_id = category.id)
    INNER JOIN promotion ON product.pro_id = promotion.id)
    INNER JOIN trademark ON product.trade_id = trademark.id
    )
WHERE
    category.id = $id
          ";

    return query_pro($sql);
}
//
function search_product($name)
{
    $sql = "SELECT 
        san_pham.id as id, 
        san_pham.id_danh_muc, 
        san_pham.name as ten_san_pham 
        ,mo_ta,
        trang_thai,
        anh_san_pham,
        gia_san_pham,
        khuyen_mai,
        phu_kien
        FROM danh_muc INNER JOIN san_pham  ON danh_muc.id=san_pham.id_danh_muc
        WHERE san_pham.name LIKE '%$name%'";

    return query_pro($sql);
}
//
function pro_catee($cate_id, $value)
{
    return pro_cate("san_pham", $cate_id, $value);
}
//max_luot_xem
function max_view()
{
    $sql = "SELECT MAX(luot_xem) as hehe, name,id_danh_muc,id
        FROM san_pham  WHERE luot_xem > 20 GROUP BY name,id_danh_muc,id";
    return query_pro($sql);
}


//limit
function sp_lx()
{
    $sql = "SELECT trademark.id as trid, product.id as proid, prd_image,prd_name,prd_price,trade_name, pro_sale
    FROM product 
    INNER JOIN trademark ON product.trade_id = trademark.id  
    INNER JOIN promotion ON product.pro_id = promotion.id  
      
    ORDER BY prd_view DESC LIMIT 0,12";
    return query_pro($sql);
}



//sp new
function sp_new()
{
    $sql = "SELECT trademark.id as trid, product.id as proid, prd_image,prd_name,prd_price,trade_name, pro_sale
    FROM product INNER JOIN trademark ON product.trade_id = trademark.id  
                INNER JOIN promotion ON product.pro_id = promotion.id  
    ORDER BY proid DESC LIMIT 0,12";
    return query_pro($sql);
}




//limit



//Lấy ra sản phẩm nhiều lượt xem
/*function sp_lx()
{
    $sql = "SELECT * FROM product ORDER BY prd_view DESC LIMIT 0,15";
    return query_pro($sql);
}*/
// Sản phẩm mới cập nhật
function sp_time()
{
    $sql = "SELECT * FROM product ORDER BY prd_created_at DESC LIMIT 0,15";
    return query_pro($sql);
}
// Sản phẩm sắp xếp theo giá
function sp_gia()
{
    $sql = "SELECT * FROM product ORDER BY prd_price ASC LIMIT 0,15";
    return query_pro($sql);
}
// Lấy sản phẩm theo danh mục
function sp_dm($id)
{
    $sql = "SELECT * FROM product WHERE cat_id=$id ORDER BY id DESC";
    return query_pro($sql);
}



// Liên kết 3 bảng
function lk_2($id){
    $sql = "SELECT  product.id as proid, trademark.id as trid,prd_name,cat_id,prd_image,prd_price,prd_warranty,prd_accessory,prd_featured,prd_status,prd_detail,prd_view,prd_created_at,prd_updated_at,link_video,pro_id,trade_id,trade_image,trade_name
    FROM product INNER JOIN trademark ON product.trade_id = trademark.id
    WHERE
    cat_id = $id
          ";

    return query_pro($sql);
}
function lk_3($id){
    $sql = "SELECT  product.id as proid, trademark.id as trid,prd_name,cat_id,prd_image,prd_price,prd_warranty,prd_accessory,prd_featured,prd_status,prd_detail,prd_view,prd_created_at,prd_updated_at,link_video,pro_id,trade_id,trade_image,trade_name
    FROM product INNER JOIN trademark ON product.trade_id = trademark.id
    WHERE
    cat_id = $id LIMIT 0,12
          ";

    return query_pro($sql);
}


// tìm kiếm
function tim_kiem($tu_khoa){
    $sql = "SELECT  product.id as proid, trademark.id as trid,prd_name,cat_id,prd_image,prd_price,prd_warranty,prd_accessory,prd_featured,prd_status,prd_detail,prd_view,prd_created_at,prd_updated_at,link_video,pro_id,trade_id,trade_image,trade_name
    FROM product INNER JOIN trademark ON product.trade_id = trademark.id
    WHERE
    prd_name LIKE '%$tu_khoa%'
          ";

    return query_pro($sql);
}