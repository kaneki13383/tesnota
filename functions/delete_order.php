<?php
session_name();

require './connect.php';

$id = $_GET['id'];

$sql = $connect->query("DELETE FROM feedback WHERE `feedback`.`id` = '$id'");
header("Location: ../output/admin");