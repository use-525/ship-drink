<?php
    require_once "database.php";

    // The function takes all data of the table
    function list_all_news()
    {
        return listAll("news");
    }
    // The fucntion takes a data of the table
    function list_one_news($id, $value)
    {
        return listOne("news", $id, $value);
    }
    // Add data to the table
    function insert_news($news_title,$news_content,$news_image, $news_text){
        $data = [
            'news_title' => $news_title,
            'news_content' => $news_content,
            'news_image' => $news_image,
            'news_text' => $news_text
        ];
       
        return insert("news", $data);
    }
    // Update data to the table
    function update_news($news_title,$news_content,$news_image, $news_text, $id){
        $data = [
            'news_title' => $news_title,
            'news_content' => $news_content,
            'news_image' => $news_image,
            'news_text' => $news_text
        ];
        return update("news", $data, "id", $id);
    }
    // Delete data to the table
    function delete_news($id){
        return delete("news", "id", $id);
    }
    // function query($member_name,$value){
    //     return listOne("member",$member_name,$value);
    // }
    // function query_id(){
    //     $sql = "SELECT id FROM member Where email=email";
    //     return query_nopro($sql);
    // }
    // function update_id($password,$id){
    //     $data = [
    //         'password' => $password 
    //     ];
    //     return update("member",$data,"id",$id);
    // }
