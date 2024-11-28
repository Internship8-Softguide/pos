<?php

function get_items($mysqli)
{
    $sql = "SELECT * FROM `item`";
    return $mysqli->query($sql);
}
