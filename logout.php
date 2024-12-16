<?php

$password = "my_secure_password";
        $hash1 = password_hash($password, PASSWORD_DEFAULT);
        $hash2 = password_hash($password, PASSWORD_DEFAULT);

        echo "Hash 1: $hash1\n";
        echo "Hash 2: $hash2\n";

        $userInputPassword = "user_entered_password";

// Compare user input password with the stored hash
        if (password_verify($password, $hash2)) {
         echo "Password is correct!";
        } else {
          echo "Password is incorrect.";
        }

        ?>