<?php
include "../header.php";
session_start();
?>
<br>
<div class="container">
    <div class="col-md-7">

    <?php
    $_SESSION['error'] = "Bu turkumni o‘chirish bo‘lmaydi sababi bu turkum qaysidir yangilikda foydalanilyapti !";
    echo "<div class='alert alert-danger' role='alert'>
                            ".$_SESSION['error']."
                </div>";
    unset($_SESSION['error']);
    ?>
    <a href="/admin/CategoryPage/category.php" class="btn btn-secondary" >Turkumlar bo'limiga qaytish</a>
    </div>
</div>
