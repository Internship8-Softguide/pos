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
    $isHave = true;
    for ($i = 0; $i < count($item_array);$i++) {
        if ($item_array[$i]['id'] == $item['id']) {
            $isHave = false;
            $item_array[$i]['count']++;
        }
    }
    if ($isHave) {
        array_push($item_array, ['id' => $item['id'],'name' => $item['name'],'price' => $item['price'],'count' => 1]);
    }
    $_SESSION["item_list"] = $item_array;
    header("Location:?catId=$category_id");
}

if (isset($_GET['remove'])) {
    array_splice($item_array, $_GET['remove'], 1);
    $_SESSION['item_list'] = $item_array;
    header("Location:?catId=$category_id");
}

if (isset($_GET['add'])) {
    $add = $_GET['add'];
    for ($i = 0;$i < count($item_array);$i++) {
        if ($add == $i) {
            $item_array[$i]['count']++;
        }
    }
    $_SESSION['item_list'] = $item_array;
    header("Location:?catId=$category_id");
}

if (isset($_GET['minus'])) {
    $minus = $_GET['minus'];
    for ($i = 0;$i < count($item_array);$i++) {
        if ($minus == $i) {
            $item_array[$i]['count']--;
            if ($item_array[$i]['count'] == 0) {
                array_splice($item_array, $_GET['remove'], 1);
            }
        }
    }
    $_SESSION['item_list'] = $item_array;
    header("Location:?catId=$category_id");
}
