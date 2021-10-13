<?php

//$db_con=mysql_connect("localhost","root","") or die("Payvast nashud");
//$bd=mysql_select_db($db_con,"webdev");

$connect= new mysqli("localhost","root","","webdev");
$connect->query("set names 'utf8' ");


?>