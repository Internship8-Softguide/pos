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
    $sql = "SELECT DISTINCT `table`.tableName,`invoice`.id as inv_id,(SELECT count(*) FROM `order` WHERE `invoice_id`=`invoice`.`id`) as count FROM `invoice` INNER JOIN `table` on `invoice`.table_id=`table`.id INNER JOIN `order` on `invoice`.id = `order`.invoice_id WHERE `invoice`.paid=0 AND `order`.status=0;" ;
    return $mysqli->query($sql);
}
function get_cashier_view($mysqli)
{
    $sql = "SELECT  DISTINCT `table`.id,`table`.`tableName`,(SELECT sum(`order`.`qty`) from `invoice` INNER JOIN `order` on `invoice`.id=`order`.invoice_id where `invoice`.table_id=`table`.id and `order`.status != 9) AS `count`,
(SELECT SUM((`order`.qty*item.price)) as sub_total FROM `invoice` INNER JOIN `order` on invoice.id=`order`.invoice_id INNER JOIN `item` ON `order`.item_id = `item`.id
 WHERE invoice.table_id=`table`.id and `order`.status != 9) as total
 FROM `table` INNER JOIN `invoice` on `table`.id=`invoice`.table_id WHERE `invoice`.paid=0";
    return $mysqli->query($sql);
}

function get_invoice_detail($mysqli, $table_id)
{
    $sql = "select `item`.name,`item`.price,`order`.qty from `order` inner join 
 `invoice` on `order`.invoice_id=`invoice`.id inner join `item` on `order`.item_id=`item`.id where `invoice`.table_id=$table_id";
    return $mysqli->query($sql);
}
