<?php
require_once('DbConnector.php');
require_once('change_password_class.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (isset($_POST["username"], $_POST["pw"], $_POST["new_pw"], $_POST["confirm_pass"])) {

        $user_id = 1;
        $getData = new Setpassword('', '', $user_id);
        $Datatoget = $getData->getData();
        $oldpass = $_POST["pw"];
        
        $results = $Datatoget->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
                $dbpass = $results["password"];

                if (password_verify($oldpass, $dbpass)) {
                    // Passwords match; login successful
                    echo "Login successful!";
                }
            
        }else{
          echo "<p>No results found</p>";
        }
    }
}

/*
if (isset($_POST["username"], $_POST["pw"], $_POST["new_pw"], $_POST["confirm_pass"])) {
    if (empty($_POST["username"]) || empty($_POST["pw"]) || empty($_POST["new_pw"]) || empty($_POST["confirm_pass"])) {
        echo "There are empty values";
    } else {
        $userEnteredName = trim($_POST["username"]);
        $current_pw = $_POST["pw"]; // User's entered password in plaintext
        $new_pw = trim($_POST["new_pw"]);
        $confirm_pass = trim($_POST["confirm_pass"]);

        $user_id = 1; // Assuming a fixed user ID for testing purposes

        // Retrieve hashed password from the database based on the user ID ($user_id)
        $getData = new Setpassword('', '', $user_id);
        $Datatoget = $getData->getData();
        if ($Datatoget) {
            $Data = $Datatoget->fetch(PDO::FETCH_ASSOC);
        if($Data){
            foreach($Data as $new_data){
                $databaseUserName = $new_data['username'];
                $databasepassword = $new_data['password'];

                if ($databasepassword && password_verify($current_pw, $databasepassword)) {
                    echo "Password is correct!";
                }else {
                    echo "Password is incorrect.";
                }
            }
        } else {
            echo "Invalid data structure retrieved from database.";
        }
    } else {
        echo "Failed to retrieve data from the database.";
    }
    }
}
        
        //$databaseUserName = $Data['username'];
        //$databasepassword = $Data['password']; // Retrieved hashed password from the database

        // Compare the user's entered password with the hashed password from the database
        

       /* if($databasepassword == $current_pw){
            $hash_pw = password_hash($new_pw, PASSWORD_DEFAULT);
            $setpassword = new setPassword($userEnteredName,$hash_pw, $user_id);
                    $setpassword->setPassword();
                   
                    if ($setpassword) {
                        echo "Password updated successfully.";
                    } else {
                        echo "Password update failed.";
                    }
        }
        else{
            echo"password not match";
        }*/

    
        
       // $hashedOldPassword = password_hash($old_pw, PASSWORD_BCRYPT);
        // Check if the entered old password matches the stored hashed password
      //  echo $databaseUserName;
      //  echo $userEnteredName;
       // if($databaseUserName == $userEnteredName){
      /*     if (password_verify($old_pw,$databasepassword)) {
           // if ($old_pw==$databasepassword) {
                // Check if the new password matches the confirm password
                if ($new_pw === $confirm_pass) {
                    // Hash the new password and update it in the database
                   $hashedPassword = password_hash($new_pw, PASSWORD_DEFAULT);
    
                    $setpassword = new setPassword($userEnteredName,$hashedPassword, $user_id);
                    $setpassword->setPassword();
    
                    if ($setpassword) {
                        echo "Password updated successfully.";
                    } else {
                        echo "Password update failed.";
                    }
                    echo "password equal";
                } else {
                    echo "password not equal";
                }
                
        }
        else {
            echo "not username equal ";
    }
      
        
       // echo"username password incorrect ";
       // echo "Entered Old Password: $old_pw<br> ";
//echo "Stored (Hashed) Password: $databasepassword<br>";
    }


}*/
?>

<!-- Your HTML form remains the same as in your previous code -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div class="update-profile">
   <form action="change_password.php" method="post">
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="username" placeholder="enter username" class="box">
            <span>Old Password :</span>
            <input type="password" name="pw" placeholder="enter previous password" class="box">
            <span>New Password :</span>
            <input type="password" name="new_pw" placeholder="enter new password" class="box">
            <span>Confirm Password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
         <div class="inputBox"> 
         </div>
      </div>
      <input type="submit" value="submit" name="submit" class="btn">
      <a href="new index.php" class="delete-btn">Go Back</a>
   </form>

</div>
</body>
</html>