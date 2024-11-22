<?php


function save_user($mysqli, $name, $email, $password, $role, $profile)
{
    try {
        $sql = "INSERT INTO `user` (`username`,`email`,`password`,`role`,`profile`) VALUE ('$name','$email','$password',$role,'$profile')";
        return $mysqli->query($sql);
    } catch (\Throwable $th) {
        if ($th->getCode() === 1062) {
            return "This email is alerady have been used!";
        } else {
            return "Internal server error!";
        }
    }

}

function get_user_with_id($mysqli, $id)
{
    $sql = "SELECT * FROM `user` WHERE `id`=$id";
    $user = $mysqli->query($sql);
    return $user->fetch_assoc();
}

function get_user_with_email($mysqli, $email)
{
    $sql = "SELECT * FROM `user` WHERE `email`='$email'";
    $user = $mysqli->query($sql);
    return $user->fetch_assoc();
}

function get_users($mysqli, $currentPage)
{
    $sql = "SELECT * FROM `user` ORDER BY `id` LIMIT 5 OFFSET $currentPage";
    return $mysqli->query($sql);
}

function have_admin($mysqli)
{
    $sql = "SELECT COUNT(`id`) as total FROM `user` WHERE `role`=1";
    $total = $mysqli->query($sql);
    $total = $total->fetch_assoc();
    if ($total['total'] > 0) {
        return false;
    }
    return true;
}
function get_user_pag_count($mysqli)
{
    $sql = "SELECT COUNT(`id`) AS total FROM `user`";
    $count = $mysqli->query($sql);
    $total = $count->fetch_assoc();
    $page = ceil($total['total'] / 5) ;
    return $page;
}

function get_user_filter($mysqli, $key)
{
    $sql = "SELECT * FROM `user` WHERE `username` LIKE '%$key%' OR `email`='$key'";
    return $mysqli->query($sql);
}

function delete_users($mysqli, $id)
{
    $sql = "DELETE  FROM `user` WHERE `id`= $id";
    return $mysqli->query($sql);
}

function update_users($mysqli, $id, $name, $email, $password, $role)
{
    $sql = "UPDATE `user` SET `username`='$name',`email`='$email',`password`='$password',`role`=$role WHERE `id`= $id ";
    return $mysqli->query($sql);
}
