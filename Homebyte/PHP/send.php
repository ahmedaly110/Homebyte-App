<?php
 

$fullname=$_POST['Name'];
$email=$_POST['Email'];
$phone=$_POST['Phone'];
$message=$_POST['Message'];


//include the database config file
require_once 'dbconfig.php';


    $stmt = $conn->prepare("insert into messages(fullname, email, phone, message) values(?,?,?,?)");
    $stmt->bind_param("ssis",$fullname,$email,$phone,$message);
    $stmt->execute();
    echo"message sent succesfully!";
    $stmt->close();
    $conn->close();


