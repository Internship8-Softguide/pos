<?php


function save_category($mysqli, $categoryName, $categoryImg)
{
    $sql = "INSERT INTO `category` (`categoryName`,`categoryImg`) VALUE ('$categoryName','$categoryImg')";
    return $mysqli->query($sql);
}

function get_category($mysqli)
{
    $sql = "SELECT * FROM `category`";
    return $mysqli->query($sql);
}
