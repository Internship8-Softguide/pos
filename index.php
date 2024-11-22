<?php require_once ("./stroage/db.php") ?>
<?php require_once ("./stroage/user_crud.php") ?>
<?php
if (isset($_COOKIE['user'])) {
    header("location:./home.php");
}

// $user = get_user_with_id($mysqli, 1);
// if (!$user) {
//     save_user($mysqli, "admin", "admin@gmail.com", "password", 1);
// }
// $users = get_users($mysqli);
// $users = $users->fetch_all();
// $admin_user = array_filter($users, function ($user) {
//     return $user[4] == 1;
// });
// if (!$admin_user) {
//     $admin_password = password_hash("password", PASSWORD_BCRYPT);
//     save_user($mysqli, "admin", "admin@gmail.com", $admin_password, 1);
// }
if (have_admin($mysqli)) {
    $admin_password = password_hash("password", PASSWORD_BCRYPT);
    save_user($mysqli, "admin", "admin@gmail.com", $admin_password, 1, "profile.png");
}

$email = $email_err = $password = $password_err = "";

if (isset($_POST['email'])) {
    $email = $mysqli->real_escape_string($_POST['email']) ;
    $password = $mysqli->real_escape_string($_POST['password']);
    if ($email === "") {
        $email_err = "Email cann't be blank!";
    }
    if ($password === "") {
        $password_err = "Password cann't be blank!";
    }
    if ($email_err === "" && $password_err === "") {
        $user = get_user_with_email($mysqli, $email);
        if (!$user) {
            $email_err = "User does not exist!";
        } else {
            // if ($password !== $user['password']) {
            //     $password_err = "Password does not match!";
            // } else {
            //     header("Location:./home.php");
            // }
            if (password_verify($password, $user['password'])) {
                setcookie("user", json_encode($user), time() + 1000 * 60 * 60 * 24 * 14, "/");
                header("Location:./home.php");
            } else {
                $password_err = "Password does not match!";
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>
</head>
<body>
    <div class="card mx-auto login-container">
        <div class="card-body">
            <h2 class="text-center">Login Form</h2>
            <?php if (isset($_GET['invalid'])) { ?>
                <div class="alert alert-danger"><?= $_GET['invalid'] ?></div>
            <?php } ?>
            <form method="post">
                <div class="form-floating my-5">
                    <input name="email" type="text" class="form-control" id="email" value="<?= $email ?>" placeholder="name@gmail.com">
                    <label for="email">Email address</label>
                    <div class="text-danger" style="font-size:12px;"><?= $email_err ?></div>
                </div>
                <div class="form-floating mt-5 mb-2">
                    <input name="password"  type="password" class="form-control" id="password" value="<?= $password ?>" placeholder="password">
                    <label for="password">Password</label>
                    <div class="text-danger" style="font-size:12px;"><?= $password_err ?></div>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="show" class="form-check-input">
                    <label class="form-check-label" for="show">
                        Show Password
                    </label>
                </div>
                <button class="custom-btn mt-3">LOGIN</button>
            </form>  
        </div>
    </div>
    <script>
        let show = $("#show");
        let password = $("#password");
        show.on("click",()=>{
            if(show.is(":checked")){
                password.get(0).type = "text";
            }else{
                password.get(0).type = "password";
            }
        })
    </script>
</body>
</html>