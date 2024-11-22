<?php require_once ("../layout/header.php") ?>
<?php require_once ("../layout/sidebar.php") ?>  
<?php
$categoryName = $categoryNameErr = "";
$categoryImg = $categoryImgErr = "";
if (isset($_POST['categoryName'])) {
    $categoryName = $_POST['categoryName'];
    $file =  $_FILES['categoryImg'];
    $categoryImg = $file['name'];
    $tmp = $file['tmp_name'];
    $img = file_get_contents($tmp);
    $data = base64_encode($img);

    if ($categoryNameErr === "" && $categoryImgErr === "") {
        if (save_category($mysqli, $categoryName, $data)) {
            echo "<script>location.replace('./category_list.php')</script>";
        }
    }
}
?>
    <div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="card m-5">
        <div class="card-body"> 
            <h3>Add New Category</h3>
            <div class="card my-4">
                <div class="row">
                    <div class="col-3 d-none d-md-block"></div>
                    <div class="card-body col-md-6">
                       <div class="card">
                        <div class="card-body">
                            
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group my-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="categoryName" class="form-control" >
                                    <div class="validation-message"></div>
                                </div>
                                <div class="form-group my-3">
                                    <label class="form-label">Category Image</label>
                                    <input type="file" name="categoryImg" class="form-control" >
                                    <div class="validation-message"></div>
                                </div>
                                <div class="form-group my-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                       </div>
                    </div>
                    <div class="col-3 d-none d-md-block"></div>
                </div>
            </div>
        </div>
      </div>
      
    </div>

<?php require_once ("../layout/footer.php") ?>