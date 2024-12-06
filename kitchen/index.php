<?php require_once ("../layout/header.php") ?>
<div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="container mt-5">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Table Name</th>
                  <th>Total Item</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $orders = get_order($mysqli); ?>
                <?php while ($order = $orders->fetch_assoc()) { ?>
                  <tr>
                      <th><?= $order['tableName'] ?></th>
                      <th><?= $order['count'] ?></th>
                      <th>
                        <a href="./order_detail.php?id=<?= $order['inv_id'] ?>" class="btn btn-info">
                          <i class="fa fa-eye"></i>
                        </a>
                      </th>
                    </tr>
                <?php } ?>
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
<?php require_once ("../layout/footer.php") ?>