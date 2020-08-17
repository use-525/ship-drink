<?php
    require_once "database.php";

    // The function takes all data of the table
    function list_all_letter()
    {
        return listAll("letter");
    }

    // Add data to the table
    function insert_letter($letter_name,$letter_email,$letter_title,$letter_content){
        $create_at =  date("Y-m-d H:i:s");
        $data = [
            'letter_name' => $letter_name,
            'letter_email' => $letter_email,
            'letter_title' => $letter_title,
            'letter_content'=> $letter_content,
            'letter_created_at' => $create_at
        ];
        return insert("letter", $data);
    }
    function delete_letter($id){
        return delete("letter", "id", $id);
    }
    ?>