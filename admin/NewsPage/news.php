<?php
include "../header.php";
include "../../db_helper.php";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}else{
    $page = 1;
}

?>
<div class="container"><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Sarlavha</th>
            <th scope="col">To‘liq matn</th>
            <th scope="col">Turkum</th>
            <th scope="col">Muallif</th>
            <th scope="col">Ko'rishlar soni</th>
            <th scope="col">Qo‘shilgan vaqt</th>
            <th scope="col">O‘zgartirish amallari</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (getPostList($page) as $value){
            $category = getCategoryById($value['category_id']);
            $author = getAuthor($value['author_id']);
//            echo "<pre>";
//             print_r($category);
            echo "<tr>";
            echo "<td>".$value['id']."</td>";
            echo "<td>".$value['title']."</td>";
            echo "<td>".$value['content']."</td>";
            echo "<td>".$category['title']."</td>";
            echo "<td>".$author['firstname']."</td>";
            echo "<td>".$value['visited_count']."</td>";
            echo "<td>".$value['created_date']."</td>";
            echo "<td><a href='/admin/NewsPage/update_news.php?id=".$value['id']."' class='btn btn-primary'>Tahrirlash</a>
                  <a href='/admin/NewsPage/delete_news.php?id=".$value['id']."' class='btn btn-danger'>O'chrish</a></td>";
            echo "</tr>";
        }
        ?>

        </tbody>

    </table>
    <a href="/admin/NewsPage/add_news.php" class="btn btn-success" style="float: right;">Yangi yangilik qo‘shish</a>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php  for ($page = 1; $page <= getPagination("post"); $page++) {?>
                <li class="page-item"><a class="page-link" href="/admin/NewsPage/news.php?page=<?=$page?>"><?=$page?></a></li>
            <?php }?>

            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
