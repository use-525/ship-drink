<?php
    require_once "database.php";

    // The function takes all data of the table
    function list_all_category()
    {
        return listAll("category");
    }
    // The fucntion takes a data of the table
    function list_one_category($id, $value)
    {
        return listOne("category", $id, $value);
    }
    // Add data to the table
    function insert_category($cat_name,$cat_image){
        $create_at =  date("Y-m-d H:i:s");
        $data = [
            'cat_name' => $cat_name,
            'cat_image' => $cat_image,
            'cat_created_at' => $create_at,
            'cat_updated_at' => $create_at
        ];
        return insert("category", $data);
    }
    // Update data to the table
    function update_category($cat_name,$cat_image,$id){
        $updated_at =  date("Y-m-d H:i:s");
        $data = [
            'cat_name' => $cat_name,
            'cat_image' => $cat_image,
            'cat_updated_at' => $updated_at
        ];
        return update("category", $data, "id", $id);
    }
    // Delete data to the table
    function delete_category($id){
        return delete("category", "id", $id);
    }
    ?>