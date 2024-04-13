<?php
include "../header.php";
include "../../db_helper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tag_row=getTagById($id);
}


if (isset($_POST["update_tag"])) {
    $name = $_POST['name'];
    updateTag($id,$name);
    header("Location: /admin/TagPage/tag.php");
    exit;

}elseif (isset($_POST["ortga_tag"])) {
    header("Location: /admin/TagPage/tag.php");
}
?>
<div class="container">
<div class="row">
    <div class="row justify-content-start">
        <div class="col-md-6">
    <form method="post">
        <div class="mb-3">
            <label for="Tag_name_input" class="form-label">Teg </label>
            <input type="text" class="form-control" id="Tag_name_input" name="name" value="<?=$tag_row['name']?>">
            <div id="emailHelp" class="form-text">Yangi teg nomni qo'shing !</div>
        </div>
        <button type="submit" name="update_tag" class="btn btn-primary" >Amalga oshirish</button>
        <button type="submit" name="ortga_tag" class="btn btn-secondary" >Ortga qaytish</button>
    </form>
</div>
</div>
</div>
</div>