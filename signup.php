<?php
require_once('./classes/Register.php');
require_once('./classes/DbConnector.php');

if (isset($_POST["fname"], $_POST["lname"], $_POST["contactnumber"], $_POST["username"],$_POST["email"],$_POST["password"],$_POST["confirm_password"], $_FILES['update_image'])) {
  if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["contactnumber"]) || empty($_POST["username"])|| empty($_POST["email"])|| empty($_POST["password"])|| empty($_POST["confirm_password"])||empty($_FILES['update_image'])) {
      echo "There are empty values";
  } else {
      $fName = trim($_POST["fname"]);
      $lName = trim($_POST["lname"]);
      $tp = trim($_POST["contactnumber"]);
      $username = trim($_POST["username"]);
      $email = trim($_POST["email"]);
      $password = trim($_POST["password"]);
      $confirm_pass = trim($_POST["confirm_password"]);
      $file = $_FILES['update_image'];
      $imageData = '';

      if (isset($file) && $file['error'] === 0) {
        $imageData = file_get_contents($file['tmp_name']);
    }
      
      
     $hashedPassword = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);
     $hashedconfirm_pass = password_hash(trim($_POST["confirm_password"]), PASSWORD_BCRYPT);

      // Check if the entered old password matches the stored hashed password
     // if (password_verify($old_pw, $dbpassword)) {
      if ($hashedPassword===$hashedconfirm_pass) {
              $setUser = new Register($fName,$lName,$tp,$username,$email,$password,$imageData);
              $setUser->register();

      }
       else {
          echo "error";
      }
     
  }
}


?>



<html>
<head>
  <title>Sign Up Form</title>
  <link rel="stylesheet" type="text/css" href="./css/signup.cs">
</head>
<body>

  <div class="container">
    <h1>Sign Up</h1>
    <form action="" method="post" id="info">

      <label for="username">First name</label>
      <input class="txt" type="text" id="fname" name="fname" placeholder="Enter your fname">

      <label for="username">Last name</label>
      <input class="txt" type="text" id="lname" name="lname" placeholder="Enter your lname">

      <label for="username">Contact number</label>
      <input class="txt" type="text" id="contactnumber" name="contactnumber" placeholder="Enter your contactnumber">

      <label for="username">Username</label>
      <input class="txt" type="text" id="username" name="username" placeholder="Enter your username">

      <label for="email">Email</label>
      <input class="txt" type="email" id="email" name="email" placeholder="Enter your email">

      <label for="password">Password</label>
      <input class="txt" type="password" id="password" name="password" placeholder="Enter your password">

      <label for="confirm-password">Confirm Password</label>
      <input class="txt" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">

      <label for="profile_pic">Profile picture</label>
      <input type="file" name="update_image" accept="" class="box">

      <button type="submit">Sign Up</button>
      
    </form>
  </div>

</body>
<script>
   document.getElementById("info").addEventListener("submit", function (event) {
    var telephoneInput = document.getElementById("contactnumber");
    var telephoneValue = telephoneInput.value;

    if (telephoneValue.length !== 10 || !/^\d+$/.test(telephoneValue)) {
        alert("Invalid telephone number. Please enter 10 digits with no non-numeric characters.");
        telephoneInput.focus();
        event.preventDefault(); // Prevent the form from submitting if the input is invalid.
    }
});
</script>

</html>