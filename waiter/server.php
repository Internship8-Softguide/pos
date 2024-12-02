<?php

session_start();

$item_array = [];

if (isset($_SESSION["item_list"])) {
    $item_array = $_SESSION["item_list"];
}

$category_id = 0;
if (isset($_GET['catId'])) {
    $category_id = $_GET['catId'];
}


if (isset($_GET['itemId'])) {
    $item = get_items_with_item_id($mysqli, $_GET['itemId']);
    array_push($item_array, $item);
    $_SESSION["item_list"] = $item_array;
}
