<?php require_once ("../layout/header.php") ?>
<?php
if (isset($_GET['ots'])) {
    ots($mysqli, $_GET['ots']);
    header("location:?id=$_GET[id]");
}
if (isset($_GET['accept'])) {
    accept_order($mysqli, $_GET['accept']);
    header("location:?id=$_GET[id]");
}
if (isset($_GET['done'])) {
    done_order($mysqli, $_GET['done']);
    header("location:?id=$_GET[id]");
}
?>
<div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="container mt-5">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Item name</th>
                  <th>Qty</th>
                  <th>Out of stock</th>
                  <th>Accept</th>
                  <th>Done</th>
                </tr>
              </thead>
              <tbody>
              <?php $order_list = get_order_with_invoice($mysqli, $_GET['id']); ?>
              <?php
              $order_count = get_order_with_invoice($mysqli, $_GET['id']);
if (count($order_count->fetch_all()) == 0) {
    header("location:../index.php");
} ?>
              <?php while ($order = $order_list->fetch_assoc()) {?>
                <tr>
                  <th><?= $order['name'] ?></th>
                  <th><?= $order['qty'] ?></th>
                  <th>
                    <?php if ($order['status'] == 9) {?>
                      <span class="text-danger">Out of stock</span>
                    <?php } elseif ($order['status'] == 0) { ?>
                    <a href="?ots=<?= $order['id']?>&id=<?= $order['invoice_id']?>" class="btn btn-danger">
                      <i class="fa fa-xmark"></i>
                    </a>
                  <?php } else { ?>
                    <i class="fa fa-xmark" style="font-size:28px;margin-left:5px;color:gray;"></i>
                  <?php } ?>
                  </th>
                  <th>
                    <?php if ($order['status'] == 0) { ?>
                    <a href="?accept=<?= $order['id']?>&id=<?= $order['invoice_id']?>" class="btn btn-primary">
                      <i class="fa fa-check"></i>
                    </a>
                   <?php } elseif ($order['status'] == 1) {?>
                      <i class="fa fa-check-circle" style="font-size:28px;margin-left:5px;color:green;"></i>
                      <?php } elseif ($order['status'] == 2) { ?>
                        <span class="text-success">done</span>
                      <?php } ?>
                  </th>
                  <th>
                  <?php if ($order['status'] == 0) { ?>
                    <i class="fa fa-bell" style="font-size:28px;margin-left:5px;color:green;"></i>
                    <?php } elseif ($order['status'] == 1) {?>
                      <a href="?done=<?= $order['id']?>&id=<?= $order['invoice_id']?>" class="btn btn-success">
                        <i class="fa fa-bell"></i>
                      </a>
                      <?php } elseif ($order['status'] == 2) { ?>
                        <span class="text-success">done</span>
                      <?php } ?>
                  </th>
                </tr>
                <?php }?>
              
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
<?php require_once ("../layout/footer.php") ?>