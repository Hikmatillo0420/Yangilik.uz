<?php
include "../header.php";
include "../../db_helper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_row=getCategoryById($id);
}


if (isset($_POST["update_category"])) {
    $title = $_POST['title'];
    updateCategory($id,$title);
    header("Location: /admin/CategoryPage/category.php");
    exit;

}elseif (isset($_POST["ortga_category"])) {
    header("Location: /admin/CategoryPage/category.php");
}
?>
<div class="container">
    <div class="row">
        <div class="row justify-content-start">
            <div class="col-md-6">
                <form method="post">
                     <div class="mb-3">
                         <label for="category_name_input" class="form-label">Turkum</label>
                         <input type="text" class="form-control" id="category_name_input" name="title" value="<?=$category_row['title']?>">
                     <div id="emailHelp" class="form-text">Yangi turkum nomni qo'shing !</div>
            </div>
        <button type="submit" name="update_category" class="btn btn-primary" >Amalga oshirish</button>
        <button type="submit" name="ortga_category" class="btn btn-secondary" >Ortga qaytish</button>

    </form>
</div>
</div>
</div>
</div>