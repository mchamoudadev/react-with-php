<?php
// show error message in php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('./header.php');


function register_project($conn){

    // distructring like JS with objects and arrays
    extract($_POST);
    $data = array();
    // real_escape_string is protecting us for denying special charactres like ` or apostrophe
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $query = "INSERT INTO `projects`(`title`, `description`) VALUES('$title','$description')";
    // Excecution
    $result = $conn->query($query);
    // chck if there is an error or not
    if($result){
            $data = array("status" => true, "data" => "Registered Succesfuuly 😊😊😎");
    }else{
        $data = array("status" => false, "data"=> $conn->error);
    }
    echo json_encode($data);
}

function update_project($conn){

    extract($_POST);
    $data = array();
    // real_escape_string is protecting us for denying special charactres like ` or apostrophe
    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $query = "UPDATE projects set title ='$title', description = '$description' WHERE id = '$id'";
    // Excecution
    $result = $conn->query($query);
    // chck if there is an error or not
    if($result){
            $data = array("status" => true, "data" => "Updated Successfully");
    }else{
        $data = array("status" => false, "data" => $conn->error);
    }
    echo json_encode($data);
}


function read_all_projects($conn){

    $data = array();
    $array_data = array();
    $query = "SELECT * from projects";
    $result = $conn->query($query);

    if($result){
        while($row = $result->fetch_assoc()){
            $array_data [] = $row;
        }
        $data = array("status" => true, "data" => $array_data);
    }else{
        $data = array("status" => false, "data" => $conn->error);
    }
    echo json_encode($data);
}



function get_project_info($conn){

    extract($_POST);
    $data = array();
    $array_data = array();
    $query = "SELECT * FROM `projects` where id = '$id'";
    $result = $conn->query($query);

    if($result){
       $row = $result->fetch_assoc();
       $data = array("status" => true, "data" =>$row);
    }else{
        $data = array("status" => false, "data" => $conn->error);
    }
    echo json_encode($data);
}


function delete_project($conn){

    extract($_POST);
    $data = array();
    $array_data = array();
    $query = "DELETE FROM `projects` where id = '$id'";
    $result = $conn->query($query);

    if($result){
        $data = array("status" => true, "data" =>"Deleted Successfully😘");
    }else{
        $data = array("status" => false, "data" => $conn->error);
    }
    echo json_encode($data);
}


if(isset($_POST['action'])){
    $action = $_POST['action'];
    // execute the fundtion that we requested
    $action($conn);
}else{
    echo json_encode(array("status" => false, "data" => "Action Required...",  "post"=>$_POST));
}