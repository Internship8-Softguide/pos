<?php require_once ("../layout/header.php") ?>
<?php
if (isset($_GET['ots'])) {
    ots($mysqli, $_GET['ots']);
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
              <?php while ($order = $order_list->fetch_assoc()) {?>
                <tr>
                  <th>Crap salad</th>
                  <th>2</th>
                  <th>
                    <a href="?ots=<?= $order['id']?>&id=<?= $order['invoice_id']?>" class="btn btn-danger">
                      <i class="fa fa-xmark"></i>
                    </a>
                  </th>
                  <th>
                    <a href="?accept=1" class="btn btn-primary">
                      <i class="fa fa-check"></i>
                    </a>
                  </th>
                  <th>
                    <a href="?done=1" class="btn btn-success">
                      <i class="fa fa-bell"></i>
                    </a>
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