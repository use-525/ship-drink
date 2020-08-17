<?php
require_once "database.php";

// The function takes all data of the table
function list_all_trademark()
{
    return listAll("trademark");
}
// The fucntion takes a data of the table
function list_one_trademark($id, $value)
{
    return listOne("trademark", $id, $value);
}
// Add data to the table
function insert_trademark($trade_name,$trade_image)
{
    $data = [
        'trade_image' => $trade_image,
        'trade_name' => $trade_name

    ];
    return insert("trademark", $data);
}
// Update data to the table
function update_trademark($trade_name,$trade_image,$id)
{

    $data = [
        'trade_image' => $trade_image,
        'trade_name' => $trade_name
    ];
    return update("trademark", $data, "id", $id);
}
// Delete data to the table
function delete_trademark($id)
{
    return delete("trademark", "id", $id);
}
