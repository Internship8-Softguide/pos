<?php


function save_invoice($mysqli, $table_id)
{
    $sql = "INSERT INTO `invoice` (`table_id`,`paid`) VALUE ($table_id,0)";
    if ($mysqli->query($sql)) {
        $sql = "SELECT `id` FROM `invoice` ORDER BY `ID` DESC LIMIT 1";
        $result = $mysqli->query($sql);
        $lest_row = $result->fetch_assoc();
        return $lest_row['id'];
    }
}
