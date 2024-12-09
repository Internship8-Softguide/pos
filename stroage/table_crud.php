<?php


function save_table($mysqli, $name, $email, $password, $role)
{
    $sql = "INSERT INTO `table` (`tablename`,`email`,`password`,`role`) VALUE ('$name','$email','$password',$role)";
    return $mysqli->query($sql);
}

function taken_table($mysqli, $table_id)
{
    $sql = "UPDATE `table` SET `taken`=1 WHERE `id`=$table_id";
    return $mysqli->query($sql);
}

function get_table_with_id($mysqli, $id)
{
    $sql = "SELECT * FROM `table` WHERE `id`=$id";
    $table = $mysqli->query($sql);
    return $table->fetch_assoc();
}

function get_tables($mysqli)
{
    $sql = "SELECT * FROM `table`";
    return $mysqli->query($sql);
}

function delete_tables($mysqli, $id)
{
    $sql = "DELETE * FROM `table` WHERE `id`= $id";
    return $mysqli->query($sql);
}

function update_tables($mysqli, $id, $name, $email, $password, $role)
{
    $sql = "UPDATE `table` SET `tablename`='$name',`email`='$email',`password`='$password',`role`=$role WHERE `id`= $id ";
    return $mysqli->query($sql);
}
