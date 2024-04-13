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
            <th scope="col">Teg nomi</th>
            <th scope="col">O‘zgartirish amallari</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (getTagList($page) as $value){
            echo "<tr>";
            echo "<td>".$value['id']."</td>";
            echo "<td>".$value['name']."</td>";
            echo "<td><a href='/admin/TagPage/update_tag.php?id=".$value['id']."' class='btn btn-primary'>Tahrirlash</a>
                  <a href='/admin/TagPage/delete_tag.php?id=".$value['id']."' class='btn btn-danger'>O'chrish</a></td>";
            echo "</tr>";
        }?>
        </tbody>

    </table>
    <a href="/admin/TagPage/add_tag.php" class="btn btn-success" style="float: right;">Yangi Teg  qo'shish</a>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php  for ($page = 1; $page <= getPagination("tag"); $page++) {?>
                <li class="page-item"><a class="page-link" href="/admin/TagPage/tag.php?page=<?=$page?>"><?=$page?></a></li>
            <?php }?>

            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
