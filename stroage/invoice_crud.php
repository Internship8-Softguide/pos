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


function get_order($mysqli)
{
    $sql = "SELECT `table`.tableName,`invoice`.id as inv_id,(SELECT count(*) FROM `order` WHERE `invoice_id`=`invoice`.`id`) as count FROM `invoice` INNER JOIN `table` on `invoice`.table_id=`table`.id WHERE `invoice`.paid=0" ;
    return $mysqli->query($sql);
}
