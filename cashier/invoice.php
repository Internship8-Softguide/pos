<?php require_once ("../layout/header.php") ?>
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
                        <tr>
                            <td>Beef</td>
                            <td>3300</td>
                            <td>2</td>
                            
                            <td>6600</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Beef</td>
                            <td>3300</td>
                            <td>2</td>
                            
                            <td>6600</td>
                            <td></td>
                        </tr>
                        <tr><td colspan="5"></td></tr>
                        <tr>
                            <td  colspan="3"> <h5>Total</h5></td>
                            <td>1200 MMK</td>
                            <td><a href="?pay" class="btn btn-primary">
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