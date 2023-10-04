<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//Database Connection
$servername = "localhost";
$username = "id21100861_form";
$password = "Form@2023";
$db = "id21100861_vyxoform";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error)
{
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
} 
else 
{
  $stmt = $conn->prepare("INSERT INTO details (name, email, phone, message) VALUES(?, ?, ?, ?)");
  $stmt->bind_param("ssis", $name, $email, $phone, $message);
  $stmt->execute();
  echo "Message Send Successfully...";

  $stmt->close();
  $conn->close();
}
?>