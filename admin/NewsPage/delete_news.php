<?php
include "../header.php";
include "../../db_helper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_row = getCategoryById($id);
    if(isset($_GET['confirm'])){
        deleteNews($id);
        header("Location: /admin/NewsPage/news.php");
    }
}
?>
<div class="container">
<h2>Rostdanam o'chirmoqchimisiz ?</h2><br>
<a href="/admin/NewsPage/delete_news.php?id=<?=$id?>&confirm=1" class="btn btn-danger">Ha</a>
<a href="/admin/NewsPage/news.php" class="btn btn-primary" >Yoq</a>
</div>