<?php require_once("./auth/isLogin.php");?>
<?php
if ($user['role'] == 1) {
    header("location:./admin/index.php");
} elseif ($user['role'] == 2) {
    header("location:./cashier/index.php");
} elseif ($user['role'] ==  3) {
    header("location:./kitchen/index.php");
} else {
    header("location:./waiter/index.php");
}
