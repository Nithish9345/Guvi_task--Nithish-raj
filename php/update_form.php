<?php
// Include the PHP script to establish a database connection
$conn = mysqli_connect('localhost','root','','user_db');

// Check if the user is logged in and get their ID
session_start();
if(!isset($_SESSION['user_id'])) {
  header('Location: login.html');
  exit();
}
$email = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['username'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $addr = $_POST['address'];
  $dob = $_POST['dob'];
  $query = "SELECT * FROM user_form WHERE Email = '$email'"; // modify query to use user input
$result = mysqli_query($conn, $query); // execute query

    $user_data = mysqli_fetch_assoc($result);
  $query = "UPDATE user_form SET gender='$gender', phone='$phone', addr='$addr', dob='$dob' WHERE Email='$email'";
  mysqli_query($conn, $query);
}
?>
