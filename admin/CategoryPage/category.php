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
    <div class="row justify-content-start">
        <div class="col-md-6">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Turkum nomi</th>
        <th scope="col">O‘zgartirish amallari</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach (getCategoryList($page) as $value){
        echo "<tr>";
        echo "<td>".$value['id']."</td>";
        echo "<td>".$value['title']."</td>";
        echo "<td><a href='/admin/CategoryPage/update_category.php?id=".$value['id']."' class='btn btn-primary'>Tahrirlash</a>
                  <a href='/admin/CategoryPage/delete_category.php?id=".$value['id']."' class='btn btn-danger'>O'chrish</a></td>";
        echo "</tr>";
    }?>
    </tbody>
</table>
    <a href="/admin/CategoryPage/add_category.php" class="btn btn-success" style="float: right;">Yangi turkum qo'shish</a>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php  for ($page = 1; $page <= getPagination("category"); $page++) {?>
                <li class="page-item"><a class="page-link" href="/admin/CategoryPage/category.php?page=<?=$page?>"><?=$page?></a></li>
            <?php }?>

            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
    </div>
</div>
