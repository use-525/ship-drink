<?php
    session_start();
    extract($_REQUEST);
       if(isset($_POST["id"])&&isset($_POST["num"])){
           $num = $_POST["num"];
           $id = $_POST["id"];
        $cart = $_SESSION["cart"];
        if(array_key_exists($id,$cart)){
            if($num >0){
            $cart[$id] = array(
                'prd_name'=> $cart[$id]['prd_name'],
                'num'=>$num,
                'prd_price'=> $cart[$id]['prd_price'],
                'prd_image'=> $cart[$id]['prd_image']
            );
        }else{
                unset ($cart[$id]);
        }
           $_SESSION["cart"] = $cart ;
        }

       }

?>