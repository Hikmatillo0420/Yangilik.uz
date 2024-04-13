<?php
include "../header.php";
include "../../db_helper.php";

if (isset($_POST["add_tag"])) {
   $name = $_POST['name'];
    addTag($name);
   header("Location: /admin/TagPage/tag.php");exit;

}elseif (isset($_POST["ortga_tag"])) {
    header("Location: /admin/TagPage/tag.php");exit;
}
?>

<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-6">
    <div class="row">
        <form method="post">
         <div class="mb-3">
              <label for="Tag_name_input" class="form-label">Teg</label>
              <input type="text" class="form-control" id="Tag_name_input" name="name">
              <div id="emailHelp" class="form-text"> Yangi teg nomni kiriting !</div>
        </div>
            <button type="submit" name="add_tag" class="btn btn-primary" >Amalga oshirish</button>
            <button type="submit" name="ortga_tag" class="btn btn-secondary" >Ortga qaytish</button>
        </form>
 </div>
</div>
    </div>
</div>