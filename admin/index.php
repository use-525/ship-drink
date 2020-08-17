<?php
ob_start();
session_start();
require_once "../libs/database.php";
require_once "../config/config.php";
require_once "../libs/category.php";
require_once "../libs/cart1.php";
require_once "../libs/comment.php";
require_once "../libs/member.php";
require_once "../libs/product.php";
require_once "../libs/promotion.php";
require_once "../libs/trademark.php";
require_once "../libs/news.php";
require_once "../libs/letter.php";
//require_once "../libs/slider.php";


$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case '':
        include_once "themes/dashboard.php";
        break;
    case 'login':
        include_once "themes/login.php";
        break;
    case 'password':
        include_once "themes/re_password.php";
        break;
    case 'signup':
        include_once "themes/signUp.php";
        break;
    case 'dashboard_category':
        include_once "themes/dashboard_category.php";
        break;
    case 'dashboard':
        include_once "themes/dashboard.php";
        break;
        // lấy hành động trong categories
    case 'category':
        // lấy hành động trong categories
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/category.php';
                break;
            case 'add':
                include_once 'themes/add_category.php';
                break;
            case 'update':
                include_once 'themes/edit_category.php';
                break;
        }
        break;
        // lấy hành động trong products
    case 'product':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/product.php';
                break;
            case 'add':
                include_once 'themes/add_product.php';
                break;
            case 'update':
                include_once 'themes/edit_product.php';
                break;
        }
        break;


        // lấy hành động trong User
    case 'letter':
        include_once "themes/letter.php";
        break;

    case 'member':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/member.php';
                break;
            case 'add':
                include_once 'themes/add_member.php';
                break;
            case 'update':
                include_once 'themes/edit_member.php';
                break;
        }
        break;
    case 'comment':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/comment.php';
                break;
            case 'update':
                include_once 'themes/edit_comment.php';
                break;
        }
        break;
    case 'login_signup':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/login.php';
                break;
            case 'signup':
                include_once 'themes/signup.php';
                break;
            case 'password':
                include_once 'themes/password.php';
                break;
        }

        break;
    case 'trademark':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/trademark.php';
                break;
            case 'add':
                include_once 'themes/add_trademark.php';
                break;
            case 'update':
                include_once 'themes/edit_trademark.php';
                break;
        }
        break;
    case 'promotion':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/promotion.php';
                break;
            case 'add':
                include_once 'themes/add_promotion.php';
                break;
            case 'update':
                include_once 'themes/edit_promotion.php';
                break;
        }
        break;
    case 'slider':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/slider.php';
                break;
            case 'add':
                include_once 'themes/add_slider.php';
                break;
            case 'update':
                include_once 'themes/edit_slider.php';
                break;
        }
        break;
    case 'card':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/card.php';
                break;
            case 'add':
                include_once 'themes/add_card.php';
                break;
            case 'update':
                include_once 'themes/edit_card.php';
                break;
        }
        break;
    case 'news':
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($action) {
            case '':
                include_once 'themes/news.php';
                break;
            case 'add':
                include_once 'themes/add_news.php';
                break;
            case 'update':
                include_once 'themes/edit_news.php';
                break;
        }
        break;
    default:
        echo "404 Not Found";
        break;
}



ob_end_flush();
?>