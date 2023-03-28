<?php
$conn = mysqli_connect('localhost','root','','user_db');
$error = array();
if(isset($_POST["submit"]))
{ 
  $Name= mysqli_real_escape_string($conn,$_POST["name"]);
  $Email= mysqli_real_escape_string($conn,$_POST["email"]);
  $Password= md5($_POST["psw"]);


  $select = "SELECT * FROM user_db WHERE email='$Email' && password='$Password'";
  $result = mysqli_query($conn,$select);

  if(isset($error) && count($error) > 0){
  echo "document.getElementById('signup-msg').innerHTML = '".implode("<br>", $error)."';";
}

  if(mysqli_num_rows($result)>0){
     $error[]='User already exists!';   
  }
  else{
    $insert = "INSERT INTO user_db(name,email,password) VALUES ('$Name','$Email','$Password')"; 
    mysqli_query($conn,$insert);
    header('location:login.html');
  }
}
?>

