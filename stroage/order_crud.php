<?php


function save_order($mysqli, $item_id, $invoice_id, $qty)
{
    $sql = "INSERT INTO `order` (`item_id`,`invoice_id`,`qty`,`status`) VALUE ($item_id,$invoice_id,$qty,0)";
    return $mysqli->query($sql);
}
