<?php require_once ("../layout/header.php") ?>
<?php
if (isset($_GET['id'])) {
    $table_id = $_GET['id'];
}
if (isset($_GET['pay'])) {
    pay_invoice($mysqli, $table_id);
    free_table($mysqli, $table_id);
    header("location:./index.php");
}
?>
<div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="container mt-5">
        <div class="card">
          <div class="card-body">
          <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th style="width: 200px;">Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $invoices = get_invoice_detail($mysqli, $table_id)?>
                        <?php $total = 0 ?>
                        <?php while ($invoice = $invoices->fetch_assoc()) {?>

                        <tr>
                            <td><?= $invoice['name']?></td>
                            <td><?= $invoice['price']?> MMK</td>
                            <td><?= $invoice['qty']?></td>
                            
                            <td>
                                <?php
                                echo $invoice['price'] * $invoice['qty'];
                            $total  = $total + ($invoice['price'] * $invoice['qty']);
                            ?>
                            </td>
                            <td></td>
                        </tr>
                        <?php }?>
                      
                        <tr><td colspan="5"></td></tr>
                        <tr>
                            <td  colspan="3"> <h5>Total</h5></td>
                            <td> <?= $total ?> MMK</td>
                            <td><a href="?id=<?= $_GET['id']?>&pay" class="btn btn-primary">
                            <i class="fa fa-hand-holding-dollar"></i>
                            </a></td>
                        </tr>
                    </tbody>
                </table>  
          </div>
        </div>
      </div>
    </div>
<?php require_once ("../layout/footer.php") ?>