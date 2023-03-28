function validateForm() {
    var password = document.getElementById("psw").value;
    var confirmPassword = document.getElementById("psw-confirm").value;
  
    if (password != confirmPassword) {
      document.getElementById("error-msg").innerHTML = "Passwords do not match";
      return false;
    }
    return true;
  }
  

  