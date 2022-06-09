<?php
// for cors origin allowing
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
header("Content-Type: application/json; charset=utf8mb4");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

header("Content-Type: application/json");
$_POST = json_decode(file_get_contents("php://input"), true);

// include './header.php';
include './conn.php';




?>