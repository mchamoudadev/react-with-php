<?php

$conn = new mysqli("localhost","root","","projects");

if($conn->connect_error){
    echo $conn->error;
}