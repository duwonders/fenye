<?php
include("class.php");
$page = $_GET['page'];
$newpage = new fenye($page);
$newpage->select();
?>