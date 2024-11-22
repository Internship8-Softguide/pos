<?php require_once ("../layout/header.php") ?>
<?php require_once ("../layout/sidebar.php") ?>  
<?php
$userName = $userNameErr = "";
$userEmail = $userEmailErr = "";
$role = $roleErr = "";
$password = $passwordErr = "";
$confirm = $confirmErr = "";
$profile = $profileErr = "";
$profileName = "";
$invalid = "";
if (isset($_POST['userName'])) {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $profile = $_FILES['profile'];
    $profileName = $profile['name'];
    if ($userName === "") {
        $userNameErr = "User name can't be blank!";
        $invalid = "err";
    }
    if ($userEmail === "") {
        $userEmailErr = "User Email can't be blank!";
        $invalid = "err";
    } else {
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ ", $userEmail)) {
            $userEmailErr = "Please enter email format!";
            $invalid = "err";
        }
    }
    if ($role === "") {
        $roleErr = "Please select user role!";
        $invalid = "err";
    }
    if ($password === "") {
        $passwordErr = "Password can't be blank!";
        $invalid = "err";
    }
    if ($confirm === "") {
        $confirmErr = "Confirm password can't be blank!";
        $invalid = "err";
    } else {
        if ($confirm !== $password) {
            $confirmErr = "Confirm password must be same with password!";
            $invalid = "err";
        }
    }
    if ($profile === "") {
        $profileErr = "Please choose profile!";
        $invalid = "err";
    }
    if (!$invalid) {
        $user_password = password_hash($password, PASSWORD_BCRYPT);
        $status = save_user($mysqli, $userName, $userEmail, $user_password, $role);
        if ($status === true) {
            move_uploaded_file($profile['tmp_name'], '../assets/profile/'.$profileName);
            // header("Location:./user_list.php");
            echo "<script>location.replace('./user_list.php?lest')</script>";
        } else {
            $invalid = $status;
        }

    }
}
?>
    <div class="content">
      <?php require_once ("../layout/nav.php") ?>  
      <div class="card m-5">
        <div class="card-body"> 
            <h3>Add New User</h3>
            <div class="card my-4">
                <div class="row">
                    <div class="col-3 d-none d-md-block"></div>
                    <div class="card-body col-md-6">
                       <div class="card">
                        <div class="card-body">
                            <?php if ($invalid !== "" && $invalid !== "err") { ?>
                                    <div class="alert alert-danger"><?= $invalid ?></div>
                            <?php } ?>
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group my-3">
                                    <label class="form-label">User Name</label>
                                    <input type="text" name="userName" class="form-control" value="<?= $userName ?>">
                                    <div class="validation-message"><?= $userNameErr ?></div>
                                </div>
                                <div class="form-group my-3">
                                    <label class="form-label">User Email</label>
                                    <input type="text" name="userEmail" class="form-control" value="<?= $userEmail ?>">
                                    <div class="validation-message"><?= $userEmailErr ?></div>
                                </div>
                                <div class="form-group my-3">
                                    <label class="form-label">User Role</label>
                                    <select name="role" class="form-select">
                                        <option value="" selected>Select user role</option>
                                        <option <?php if ($role === "1") {
                                            echo "selected";
                                        } ?> value="1">Admin</option>
                                        <option <?php if ($role === "2") {
                                            echo "selected";
                                        } ?> value="2">Casher</option>
                                        <option <?php if ($role === "3") {
                                            echo "selected";
                                        } ?> value="3">Kitchen</option>
                                        <option <?php if ($role === "4") {
                                            echo "selected";
                                        } ?> value="4">Waiter</option>
                                    </select>
                                    <div class="validation-message"><?= $roleErr ?></div>
                                </div>
                                <div class="form-group my-3">
                                    <label class="form-label">User Password</label>
                                    <input type="password" name="password" value="<?= $password ?>" class="form-control">
                                    <div class="validation-message"><?= $passwordErr ?></div>
                                </div>
                                <div class="form-group my-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm" value="<?= $confirm ?>" class="form-control">
                                    <div class="validation-message"><?= $confirmErr ?></div>
                                </div>
                                <div class="form-group my-3">
                                    <label class="form-label">Profile</label>
                                    <input type="file" name="profile" value="<?= $profile ?>" class="form-control">
                                    <div class="validation-message"><?= $profileErr ?></div>
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