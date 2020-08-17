<?php
require_once "libs/addcart.php";
require_once "libs/database.php";
require_once "config/config.php";
require_once "libs/category.php";
require_once "libs/comment.php";
require_once "libs/member.php";
require_once "libs/product.php";
require_once "libs/promotion.php";
require_once "libs/trademark.php";
require_once "libs/news.php";
require_once "libs/letter.php";
require_once "libs/cart1.php";

if (isset($_POST['gui'])) {
    extract($_REQUEST);
    $_SESSION['tim_kiem'] = $tim_kiem;
    header('Location:' . ROOT . '?page=tim_kiem');
}

// if (isset($_POST['them_gio_hang'])) {
//     extract($_REQUEST);
//     id_to_session($id);
// }
$cate = list_all_category();
$sp_lx = sp_lx();
$giam_gia = list_all_promotion();
$sp_new = sp_new();

$page = isset($_GET['page']) ? $_GET['page'] : '';
require_once 'giao-dien/header.php';
switch ($page) {
    case '':;
    case 'home':
        require_once 'giao-dien/home.php';
        break;
    case 'danh_muc':
        require_once 'giao-dien/shop.php';
        break;
    case 'san_pham':
        require_once 'giao-dien/product-single.php';
        break;
    case 'login':
        require_once 'giao-dien/login.php';
        break;
    case 're_password':
        require_once 'giao-dien/re_password.php';
        break;
    case 'tim_kiem':
        require_once 'giao-dien/tim_kiem.php';
        break;
    case 'blog':
        require_once 'giao-dien/blog.php';
        break;
    case 'blog-single':
        require_once 'giao-dien/blog-single.php';
        break;
    case 'about':
        require_once 'giao-dien/about.php';
        break;
    case 'contact':
        require_once 'giao-dien/contact.php';
        break;
    case 'cart':
        require_once 'giao-dien/cart.php';
        break;
}
require_once 'giao-dien/footer.php';


ob_end_flush();
