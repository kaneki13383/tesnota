<?php
session_name();

require './connect.php';

$id = $_GET['id'];

$sql = $connect->query("DELETE FROM menu WHERE `menu`.`id` = '$id'");

header("Location: ../output/menu");