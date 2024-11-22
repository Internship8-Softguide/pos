<?php require_once ("../layout/header.php") ?>
<?php require_once ("../layout/sidebar.php") ?>  
    <div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="card m-5">
        <div class="card-body">
          <h3>Category List</h3>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $categories = get_category($mysqli); ?>
              <?php $i = 1;
while ($category = $categories->fetch_assoc()) {
    ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $category['categoryName'] ?></td>
                  <td>
                    <img class="table-img" src="data:image/' . $type . ';base64,<?= $category['categoryImg'] ?>">
                  </td>
                  <td><?= $i ?></td>
                </tr>
              <?php $i++;
}
?>
            </tbody>
          </table>
          <nav >
            <ul class="pagination pagination-sm">
              <li class="page-item active">
                <span class="page-link">1</span>
              </li>
              <li class="page-item">
                <a class="page-link" href="">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

<?php require_once ("../layout/footer.php") ?>