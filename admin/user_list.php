<?php require_once ("../layout/header.php") ?>
<?php require_once ("../layout/sidebar.php") ?>  

<?php
$currentPage = 0;
if (isset($_GET["pageNo"])) {
    $currentPage = (int) $_GET["pageNo"];
}

$pagTotal = get_user_pag_count($mysqli);
if (isset($_GET['lest'])) {
    $currentPage = ($pagTotal * 5) - 5;
}
if (isset($_GET['deleteId'])) {
    if (delete_users($mysqli, $_GET['deleteId'])) {
        echo "<script>location.replace('./user_list.php')</script>";
    }
}
?>

    <div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="card m-5">
        <div class="card-body">
          <h3>User List</h3>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Role</th>
                <th>User Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $users = get_users($mysqli, $currentPage); ?>
              <?php
                if (isset($_POST["search"]) && $_POST['search'] != '') {
                    $users = get_user_filter($mysqli, $_POST['search']);
                } ?>
              <?php
              if (isset($_POST["search"])) {
                  $i = 1;
              } else {
                  $i = $currentPage + 1;
              } ?>
              <?php while ($u = $users->fetch_assoc()) { ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $u['username'] ?></td>
                  <td><?= $u['email'] ?></td>
                  <td>
                    <?php if ($u['role'] == 1) {
                        echo "Admin";
                    } elseif ($u['role'] == 2) {
                        echo "Casher";
                    } elseif ($u['role'] == 3) {
                        echo "Kitchen";
                    } else {
                        echo "Waiter";
                    }
                  ?>
                  </td>
                  <td>
                    <img class="table-img" src="../assets/profile/<?= $u['profile'] ?>">
                  </td>
                  <th>
                    <?php if ($u['id'] === $user['id']) { ?>
                      <button class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></button>
                    <?php } else { ?>
                      <button class="btn btn-sm btn-danger deleteSelect" data-value="<?= $u['id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></button>
                    <?php } ?>
                  </th>
                </tr>
              <?php $i++;
              } ?>
            </tbody>
          </table>
          <?php if (!isset($_POST['search'])) {
              require_once("../layout/pagination.php");
          } elseif (isset($_POST['search']) && $_POST['search'] == "") {
              require_once("../layout/pagination.php");
          } ?>
        </div>
      </div>
    </div>

<?php require_once ("../layout/footer.php") ?>