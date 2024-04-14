<?php
include "constants.php";
function getCategoryList($page, $withoutLimit=false){


    include "data.php";
    $offset = ($page - 1) * LIMIT;
    $limit = LIMIT;
    if ($withoutLimit){

        $sql = "SELECT * FROM category";
        $state = $conn->prepare($sql);
    }else{
//        $limit = LIMIT;
        $sql = "SELECT * FROM category LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindParam(":limit", $limit, PDO::PARAM_INT);
        $state->bindParam(":offset", $offset, PDO::PARAM_INT);
    }

    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function addCategory($title){
    include "data.php";
    $sql_insert = "INSERT INTO category (title) VALUES (:title)";
    $state=$conn->prepare($sql_insert);
    $state->bindValue(":title", $title);
    $state->execute();
}

function getPagination($tablename){           //Pagination {category} , {news}
    include "data.php";
    $sql = "SELECT * FROM ".$tablename;
    $state=$conn->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    return ceil($total_rows/LIMIT);
}

function getCategoryById($id){
    include "data.php";
    $sql = "SELECT * FROM category where id = :id";
    $state=$conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function updateCategory($id, $title)
{
    include "data.php";
    $sql = "update category set title = :title where id = :id";
    $state=$conn->prepare($sql);
    $state->bindParam(":id", $id, PDO::PARAM_INT);
    $state->bindParam(":title", $title);
    $state->execute();
}
function deleteCategory($id){
    include "data.php";

    try {
        $sql = "delete from category where id = :id ";
        $state=$conn->prepare($sql);
        $state->bindValue(":id", $id, PDO::PARAM_INT);
        $state->execute();
    }catch (Exception $e){
        header("location: /admin/CategoryPage/dontDelete.php");exit();
    }
}

///////////--------------------============= Postga tegshli funcsiyalar

function getPostList($page){
    include "data.php";
    $offset = ($page - 1) * LIMIT;
    $limit = LIMIT;
    $sql = "SELECT * FROM post LIMIT :offset, :limit";
    $state = $conn->prepare($sql);
    $state->bindParam(":limit", $limit, PDO::PARAM_INT);
    $state->bindParam(":offset", $offset, PDO::PARAM_INT);
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function addPost($title, $content, $category_id, $author_id, $tags=null){
    include "data.php";
    $sql_insert = "INSERT INTO post (title, content, category_id, author_id, visited_count, created_date)
    VALUES (:title, :content, :category_id, :author_id, 0, :created_date)";
    $state=$conn->prepare($sql_insert);
    $state->bindValue(":title", $title);
    $state->bindValue(":content", $content);
    $state->bindValue(":category_id", $category_id);
    $state->bindValue(":author_id",  $author_id);
    $state->bindValue(":created_date", date("Y-m-d H:i:s"));
    $state->execute();
    $post_id = $conn->lastInsertId();
    $sql_post_tags = "INSERT INTO post_tag(post_id, teg_id)VALUES(:post_id, :teg_id) ";
    if($tags != null){
        foreach ($tags as $tag){
            $state_tag = $conn->prepare($sql_post_tags);
            $state_tag->bindValue(":post_id", $post_id, PDO::PARAM_INT);
            $state_tag->bindValue(":teg_id", $tag, PDO::PARAM_INT);
            $state_tag->execute();
        }
    }
}

function getAuthor($id){
    include "data.php";
    $sql = "SELECT * FROM User where id = :id";
    $state=$conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function getNewsById($id){
    include "data.php";
    $sql = "SELECT * FROM post where id = :id";
    $state=$conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function updateNews($id, $title,$content,$category_id, $author_id)
{
    include "data.php";
    $sql = "UPDATE post SET title = :title, content = :content, category_id = :category_id, author_id = :author_id WHERE id = :id";
    $state=$conn->prepare($sql);
    $state->bindParam(":id", $id, PDO::PARAM_INT);
    $state->bindParam(":title", $title);
    $state->bindParam(":content", $content);
    $state->bindParam(":category_id", $category_id);
    $state->bindParam(":author_id", $author_id);
    $state->execute();
}
function deleteNews($id){
    include "data.php";
    $sql = "delete from post where id = :id ";
    $state=$conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}


///////////--------------------============= Tag ga tegshli funcsiyalar
function getTagList($page, $withoutLimit=false)
{
    include "data.php";
    $offset = ($page - 1) * LIMIT;
    $limit = LIMIT;
    if ($withoutLimit){

        $sql = "SELECT * FROM tag";
        $state = $conn->prepare($sql);
    }else{
//        $limit = LIMIT;
        $sql = "SELECT * FROM tag LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindParam(":limit", $limit, PDO::PARAM_INT);
        $state->bindParam(":offset", $offset, PDO::PARAM_INT);
    }

    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addTag($name){
    include "data.php";
    $sql_insert = "INSERT INTO tag (name) VALUES (:name)";
    $state=$conn->prepare($sql_insert);
    $state->bindValue(":name", $name);
    $state->execute();
}

function getTagById($id)
{
    include "data.php";
    $sql = "SELECT * FROM tag where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function updateTag($id, $name)
{
    include "data.php";
    $sql = "update tag set name = :name where id = :id";
    $state=$conn->prepare($sql);
    $state->bindParam(":id", $id, PDO::PARAM_INT);
    $state->bindParam(":name", $name);
    $state->execute();
}

function deleteTag($id){
    include "data.php";
    $sql = "delete from tag where id = :id ";
    $state=$conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

/////Author ga tegishli

function getAuthorList($page, $withoutLimit=false){


    include "data.php";
    $offset = ($page - 1) * LIMIT;
    $limit = LIMIT;
    if ($withoutLimit){

        $sql = "SELECT * FROM User";
        $state = $conn->prepare($sql);
    }else{
//        $limit = LIMIT;
        $sql = "SELECT * FROM User LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindParam(":limit", $limit, PDO::PARAM_INT);
        $state->bindParam(":offset", $offset, PDO::PARAM_INT);
    }

    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}