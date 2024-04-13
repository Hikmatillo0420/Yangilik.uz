<?php
include "../header.php";
include "../../db_helper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $news_row=getNewsById($id);
}


if (isset($_POST["update_news"])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    updateNews($id,$title,$content,$category_id, $author_id);
    header("Location: /admin/NewsPage/news.php");
    exit;

}elseif (isset($_POST["ortga_news"])){
    header("Location: /admin/NewsPage/news.php");
}
$categoryList = getCategoryList(1, true);
?>
<div class="container">
<div class="row">
    <div class="row justify-content-start">
        <div class="col-md-7">
    <form method="post">
        <br>
        <div class="mb-3">
            <label for="news_title_input" class="form-label">Sarlavha </label>
            <input type="text" class="form-control" id="news_title_input" name="title" value="<?=$news_row['title']?>">
        </div>
        <div class="mb-3">
            <label for="news_name_input" class="form-label">To‘liq matn</label>
            <input type="text" class="form-control" id="news_name_input" name="content" value="<?=$news_row['content']?>">
        </div>
        <div class="mb-3">
            <label for="news_category_input" class="form-label">Turkum</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <?php
                foreach ($categoryList as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['title'] . " </option>";
                }
                ?>

                <option selected value="<?=$news_row['category_id']?>">turkum nomni tanlang</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="news_author_input" class="form-label">Muallif</label>
            <input type="text" class="form-control" id="news_author_input" name="author_id" value="<?=$news_row['author_id']?>">
        </div>
        <button type="submit" name="update_news" class="btn btn-primary" >Amalga oshirish</button>
        <button type="submit" name="ortga_news" class="btn btn-secondary" >Ortga qaytish</button>
    </form>
            <br>
</div>
</div>
</div>
</div>