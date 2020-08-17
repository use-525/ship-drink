<?php 
ob_start();
session_start();
 require_once "database.php";
 require_once "product.php";
 extract($_REQUEST);
    if(isset($_POST["id"])&&isset($_POST["num"])){
       
        $id=  $_POST["id"] ;
        $num =$_POST["num"];
        $sp_one = list_one_product('id', $id);
        if(!isset($_SESSION["cart"])){
            $cart = array();
            $cart[$id]= array(
                'prd_name'=> $sp_one['prd_name'],
                'num'=> $num,
                'prd_price'=> $sp_one['prd_price'],
                'prd_image'=> $sp_one['prd_image']
            );
            
        }else{
            $cart = $_SESSION["cart"];
            if(array_key_exists($id,$cart)){
                $cart[$id] = array(
                    'prd_name'=> $sp_one['prd_name'],
                    'num'=>(int) $cart[$id] ['num'] + $num,
                    'prd_price'=> $sp_one['prd_price'],
                    'prd_image'=> $sp_one['prd_image']
                );
            }else{
                $cart[$id]= array(
                    'prd_name'=> $sp_one['prd_name'],
                    'num'=> $num,
                    'prd_price'=> $sp_one['prd_price'],
                    'prd_image'=> $sp_one['prd_image']
                );
            }
        }
        $_SESSION["cart"] =$cart;
    //    foreach($cart as $key => $value){
        //    $numCart ++;
    //    }
       echo $numCart;
    echo "<br>";
    print_r($cart);
    }
    // if(isset($_POST['trash'])){
    //     unset($cart[$id]);
    // }

?>