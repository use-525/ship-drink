<?php
    require_once "database.php";

    // The function takes all data of the table
    function list_all_member()
    {
        return listAll("member");
    }
    // The fucntion takes a data of the table
    function list_one_member($id, $value)
    {
        return listOne("member", $id, $value);
    }
    // Add data to the table
    function insert_member($member_name,$email,$password,$member_level,$phone,$address){
        $data = [
            'member_name' => $member_name,
            'email' => $email,
            'password' => $password,
            'member_level' => $member_level,
            'phone' => $phone,
            'address' => $address
        ];
        return insert("member", $data);
    }
    // Update data to the table
    function update_member($member_name,$email,$password,$member_level,$phone,$address,$id){
        $data = [
            'member_name' => $member_name,
            'email' => $email,
            'password' => $password,
            'member_level' => $member_level,
            'phone' => $phone,
            'address' => $address
        ];
        return update("member", $data, "id", $id);
    }
    // Delete data to the table
    function delete_member($id){
        return delete("member", "id", $id);
    }
    function query($member_name,$value){
        return listOne("member",$member_name,$value);
    }
    function query_id(){
        $sql = "SELECT id FROM member Where email=email";
        return query_nopro($sql);
    }
    function update_id($password,$id){
        $data = [
            'password' => $password 
        ];
        return update("member",$data,"id",$id);
    }
