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

  $query = "SELECT * FROM user_db WHERE Email = '$email'";
  $result = mysqli_query($conn, $query);
  $user_data = mysqli_fetch_assoc($result);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['username'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $addr = $_POST['address'];
    $dob = $_POST['dob'];

    $query = "UPDATE user_db SET gender='$gender', phone='$phone', addr='$addr', dob='$dob' WHERE Email='$email'";
    mysqli_query($conn, $query);
    // Refresh the user data
    $user_data = array(
      'Name' => $name,
      'Email' => $email,
      'gender' => $gender,
      'phone' => $phone,
      'addr' => $addr,
      'dob' => $dob
    );
    
  }
  
?>