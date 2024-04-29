<?php
$servername = "localhost";
$dbname = "projet-ecom2";
$user = "root";
$password = "";

$dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
