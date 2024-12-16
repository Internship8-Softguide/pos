<?php

try {
    $mysqli = new mysqli("127.0.0.10", "root", "admin");
    $sql = "CREATE DATABASE IF NOT EXISTS `pos`";
    if ($mysqli->query($sql)) {
        if ($mysqli->select_db("pos")) {
            create_table($mysqli);
        }
    }
} catch (\Throwable $th) {
    echo "Can not connect to Database!";
    die();
}
function create_table($mysqli)
{
    $sql = "CREATE TABLE IF NOT EXISTS `user`(`id` INT AUTO_INCREMENT,`username` VARCHAR(45) NOT NULL,`email` VARCHAR(95) UNIQUE NOT NULL,`password` VARCHAR(100) NOT NULL,`role` INT NOT NULL,`profile` VARCHAR(225) NOT NULL ,PRIMARY KEY(`id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `table`(`id` INT AUTO_INCREMENT,`tableName` VARCHAR(45) NOT NULL,`seat` INT  NOT NULL,`taken` BOOLEAN NOT NULL,PRIMARY KEY(`id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `category`(`id` INT AUTO_INCREMENT,`categoryName` VARCHAR(45) NOT NULL,`categoryImg` LONGTEXT NOT NULL,PRIMARY KEY(`id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `item`(`id` INT AUTO_INCREMENT,`name` VARCHAR(45) NOT NULL,`price` INT NOT NULL,`category_id` INT NOT NULL, `img` VARCHAR(225) NOT NULL,PRIMARY KEY(`id`),FOREIGN KEY(`category_id`) REFERENCES `category`(`id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `invoice` (`id` INT AUTO_INCREMENT,`table_id` INT NOT NULL,`paid` BOOLEAN NOT NULL,PRIMARY KEY (`id`),FOREIGN KEY (`table_id`) REFERENCES `table`(`id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    $sql = "CREATE TABLE IF NOT EXISTS `order`(`id` INT AUTO_INCREMENT,`item_id` INT NOT NULL,`invoice_id` INT NOT NULL,`qty` INT NOT NULL,`status` INT NOT NULL,PRIMARY KEY(`id`),FOREIGN KEY(`item_id`) REFERENCES `item`(`id`),FOREIGN KEY(`invoice_id`) REFERENCES `invoice`(`id`))";
    if (!$mysqli->query($sql)) {
        return false;
    }
    return true;
}
