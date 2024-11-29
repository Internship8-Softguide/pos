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
              <tr>
                  <th>Couple 1</th>
                  <th>5</th>
                  <th>50000 MMK</th>
                  <th>
                    <a href="./invoice.php?id=1" class="btn btn-info">
                      <i class="fa fa-eye"></i>
                    </a>
                  </th>
                </tr>
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
<?php require_once ("../layout/footer.php") ?>