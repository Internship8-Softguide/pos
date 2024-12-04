<?php


function save_order($mysqli, $item_id, $invoice_id, $qty)
{
    $sql = "INSERT INTO `order` (`item_id`,`invoice_id`,`qty`,`status`) VALUE ($item_id,$invoice_id,$qty,0)";
    return $mysqli->query($sql);
}

function get_order_for_waiter($mysqli, $table_id)
{
    $sql = "SELECT i.name,i.price,o.qty,o.status FROM `order` o INNER JOIN `item` i on i.id=o.item_id INNER JOIN `invoice` iv on iv.id=o.invoice_id WHERE iv.table_id=$table_id AND iv.paid=0";
    return $mysqli->query($sql);
}
