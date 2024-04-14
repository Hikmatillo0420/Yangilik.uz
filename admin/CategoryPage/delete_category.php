<?php
include "../header.php";
include "../../db_helper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_row = getCategoryById($id);
    if(isset($_GET['confirm'])){
        deleteCategory($id);
        header("Location: /admin/CategoryPage/category.php");
    }
}
?>
<br>
<div class="container">
    <h2>Rostdanam <span style="color: red;"> <?=$category_row['title']?></span> turkumni o'chirmoqchimisiz ?</h2><br>
    <a href="/admin/CategoryPage/delete_category.php?id=<?=$id?>&confirm=1" class="btn btn-danger">Ha</a>
    <a href="/admin/CategoryPage/category.php" class="btn btn-primary" >Yoq</a>
</div>
