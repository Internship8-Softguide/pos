<?php

function get_items($mysqli)
{
    $sql = "SELECT * FROM `item`";
    return $mysqli->query($sql);
}

function get_items_by_category_id($mysqli, $category_id)
{
    $sql = "SELECT * FROM `item` WHERE `category_id`=$category_id";
    return $mysqli->query($sql);
}
