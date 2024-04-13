<?php
include "../header.php";
include "../../db_helper.php";

if (isset($_POST["add_category"])) {
   $title = $_POST['title'];
    addCategory($title);
   header("Location: /admin/CategoryPage/category.php");exit;

}elseif (isset($_POST["ortga_category"])) {
    header("Location: /admin/CategoryPage/category.php");exit;
}
?>

<div class="container"><br>
<div class="row">
    <div class="row justify-content-start">
        <div class="col-md-6">
<form method="post">
    <div class="mb-3">
        <label for="category_name_input" class="form-label">Turkum</label>
        <input type="text" class="form-control" id="category_name_input" name="title">
        <div id="emailHelp" class="form-text">Turkum  nomni kiriting !</div>
    </div>
    <button type="submit" name="add_category" class="btn btn-primary" >Amalga oshirish</button>
    <button type="submit" name="ortga_category" class="btn btn-secondary" >Ortga qaytish</button>

</form>
</div>
</div>
    </div>
</div>