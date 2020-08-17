<?php
require_once "database.php";
//hien thi comment theo products_id
function list_comment_product($prd_id)
{
    $sql = "SELECT c.id comment_id, prd_id, content,  member_name, comment_level,c.comment_created_at created_comment 
    FROM comment c INNER JOIN member m ON c.member_id=m.id
    WHERE prd_id='$prd_id'";
    return query_pro($sql);
}
//them 1 comment vao bang
function update_comment($comment_level, $id)
{
    $datee = date("Y-m-d H:i:s");
    $data = [
        'comment_level' => $comment_level,
        'comment_created_at' => $datee
    ];
    return update("comment", $data, "id", $id);
}
function insert_comment($prd_id, $member_id, $content, $comment_level)
{
    $date = date("Y-m-d H:i:s");
    $data = [
        'prd_id' => $prd_id,
        'member_id' => $member_id,
        'content' => $content,
        'comment_level' => $comment_level,
        'comment_created_at' => $date
    ];
    return insert("comment", $data);
}
function list_all_comment()
{
    return listAll("comment");
}
function list_one_comment($id, $value)
{
    return listOne("comment", $id, $value);
}
function delete_comment($id)
{
    return delete("comment", "id", $id);
}

function query_comment($comment_level, $value)
{
    return listOne("comment", $comment_level, $value);
}



// lấy ra bình luận sản phẩm
function list_comment_product_member()
{
    $conn = connection();
    $sql = "SELECT
    comment.id as id,
   	prd_name,
    member_name,
    comment_level,
    content,
    comment_created_at
    FROM
    ((
        comment
    INNER JOIN product ON comment.prd_id = product.id)
    INNER JOIN member ON comment.member_id = member.id)";
     
     try {
         $stmt = $conn->prepare($sql);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     } catch (PDOException $e) {
         echo "Lỗi dữ liệu " . $e->getMessage();
     } finally {
         unset($conn);
     }
     return $result;
}