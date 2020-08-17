<?php
    require_once "database.php";

    // The function takes all data of the table
    function list_all_promotion()
    {
        return listAll("promotion");
    }
    // The fucntion takes a data of the table
    function list_one_promotion($id, $value)
    {
        return listOne("promotion", $id, $value);
    }
    // Add data to the table
    function insert_promotion($pro_name,$pro_sale,$pro_image){
        $create_at =  date("Y-m-d H:i:s");
        $data = [
            'pro_name' => $pro_name,
            'pro_sale' => $pro_sale,
            'pro_image' => $pro_image,
            'pro_created_at' => $create_at,
            'pro_updated_at' => $create_at
        ];
        return insert("promotion", $data);
    }
    // Update data to the table
    function update_promotion($pro_name,$pro_sale,$pro_image,$id){
        $updated_at =  date("Y-m-d H:i:s");
        $data = [
            'pro_name' => $pro_name,
            'pro_sale' => $pro_sale,
            'pro_image' => $pro_image,
            'pro_updated_at' => $updated_at
        ];
        return update("promotion", $data, "id", $id);
    }
    // Delete data to the table
    function delete_promotion($id){
        return delete("promotion", "id", $id);
    }
