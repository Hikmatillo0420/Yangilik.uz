<?php
include "../header.php";
include "../../db_helper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tag_row = getTagById($id);
    if(isset($_GET['confirm'])){
        deleteTag($id);
        header("Location: /admin/TagPage/tag.php");
    }
}
?>
<div class="container">
   <br>
    <a href="/admin/TagPage/delete_tag.php?id=<?=$id?>&confirm=1" class="btn btn-danger">Ha</a>
    <a href="/admin/TagPage/tag.php" class="btn btn-primary" >Yoq</a>
</div>