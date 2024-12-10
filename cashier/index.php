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
                  <th>Total price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $invoices = get_cashier_view($mysqli);
while ($invoice = $invoices->fetch_assoc()) {
    ?>
              <tr>
                  <th><?= $invoice['tableName']?></th>
                  <th><?= $invoice['count']?></th>
                  <th><?= $invoice['total']?> MMK</th>
                  <th>
                    <a href="./invoice.php?id=<?= $invoice['id']?>" class="btn btn-info">
                      <i class="fa fa-eye"></i>
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