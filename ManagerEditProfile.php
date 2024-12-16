<?php
require_once 'EditProfileClasses.php';
require_once 'DbConnector.php';

if(isset($_POST["fName"], $_POST["lName"], $_POST["email"], $_POST["contact"])) {
    if(empty($_POST["fName"]) || empty($_POST["lName"]) || empty($_POST["email"]) || empty($_POST["contact"])) {
        echo "There are empty values";
    } else {
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];

        // Check if a file was uploaded
        if (isset($_FILES['update_image']) && $_FILES['update_image']['error'] === 0) {
            $imageData = file_get_contents($_FILES['update_image']['tmp_name']);
        } else {
            // Set the default image path
            $defaultImagePath = 'img/defult.png'; // Replace with your default image path
            $imageData = file_get_contents($defaultImagePath);
        }

        $user_id = 1; // Example user ID, replace it with the actual user ID
        $setData = new getSetData($fName, $lName, $email, $contact, $imageData, $user_id);
        $result = $setData->setManagerData();

        if ($result) {
            echo "Data updated successfully.";
        } else {
            echo "Data update failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <div class="update-profile">
        <form action="" method="post" enctype="multipart/form-data" id="info">
            <?php
            $user_id = 1; // Replace with the actual user ID
            $setData = new getSetData('', '', '', '', '', $user_id);
            $Data = $setData->getManagerData();

            if ($Data) {
                $dbFName = $Data['fName'];
                $dbLName = $Data['lName'];
                $email = $Data['email'];
                $contact = $Data['contact'];
                $photopath = $Data['img_path'];
            }

            echo '<img src="data:image;base64,'.base64_encode($photopath).'" alt="image">';
            ?>

            <div class="flex">
                <div class="inputBox">
                    <span>First Name :</span>
                    <input type="text" name="fName" value="<?php echo $dbFName; ?>" class="box">
                    <span>Last Name :</span>
                    <input type="text" name="lName" value="<?php echo $dbLName; ?>" class="box">
                    <span>Update your pic :</span>
                    <input type="file" name="update_image" accept="" class="box">
                </div>
                <div class="inputBox" id="">
                    <span>Contact :</span>
                    <input type="text" name="contact" id="tp" value="<?php echo $contact; ?>" class="box">
                    <span>Email :</span>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="box">
                </div>
            </div>
            <input type="submit" value="Update Profile" name="update_profile" class="btn">
            <a href="manager/Home.php" class="delete-btn">Go Back</a>
        </form>
    </div>

    <script>
        document.getElementById("info").addEventListener("submit", function (event) {
            var telephoneInput = document.getElementById("tp");
            var telephoneValue = telephoneInput.value;

            if (telephoneValue.length !== 10 || !/^\d+$/.test(telephoneValue)) {
                alert("Invalid telephone number. Please enter 10 digits with no non-numeric characters.");
                telephoneInput.focus();
                event.preventDefault(); // Prevent the form from submitting if the input is invalid.
            }
        });
    </script>
</body>
</html>
