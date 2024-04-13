<?php
include "../header.php";
include "../../db_helper.php";

if (isset($_POST["add_news"])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];

    if(isset($_POST['post_tags'])){
        $tags = $_POST['post_tags'];
    }
    addPost($title, $content, $category_id, $author_id, $tags);
    header("Location: /admin/NewsPage/news.php");
    exit;
}elseif (isset($_POST["ortga_news"])){
header("Location: /admin/NewsPage/news.php");}
$categoryList = getCategoryList(1, true);
$tagList = gettagList(1, true);
$authorList = getAuthorList(1, true);
?>
<div class="container">
<div class="row">
    <div class="row justify-content-start">
        <div class="col-md-7">
    <form method="post"><br>
        <div class="mb-3">
            <label for="news_title_input" class="form-label">Sarlavha</label>
            <input type="text" class="form-control" id="news_title_input" name="title">
        </div>
        <div class="mb-3">
            <label for="news_name_input" class="form-label">To‘liq matn</label>
            <textarea class="form-control" id="news_name_input" rows="3" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="news_category_input" class="form-label">Turkum</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <?php
                foreach ($categoryList as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['title'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="news_author_input" class="form-label">Muallif </label>
            <select name="author_id" class="form-select" aria-label="Default select example">
                <?php
                foreach ($authorList as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['firstname']. " ".$category['lastname']. "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="news_tag_input" class="form-label">Teglar </label>
            <select class="form-select" multiple aria-label="Multiple select example" name="post_tags[]">
<!--                <option selected>Open this select menu</option>-->
                <?php
                foreach ($tagList as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                }
                ?>

            </select>
        </div>

        <button type="submit" name="add_news" class="btn btn-primary" >Amalga oshirish</button>
        <button type="submit" name="ortga_news" class="btn btn-secondary" >Ortga qaytish</button>
    </form><br><br>
</div>
</div>
</div>
</div>