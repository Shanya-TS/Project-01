<?php
    require_once('./classes/Activity.php');
    require_once('./classes/Destination.php');
    require_once('./classes/Tool.php');
    require_once('./classes/DbConnector.php');
    require_once('./classes/Blog.php');
    
    session_start();
    /*--------------------------------------------------------Insert Data Into Destinations-----------------------------------------------------------------------*/
    if(isset($_POST['save_des_image'])){
        if(isset($_POST['des_name']) && !empty($_POST['des_name'])){
            $des_name = $_POST['des_name'];
        } else {
            echo "Name is missing or empty!";
            exit();
        }
        if(isset($_POST['des_location']) && !empty($_POST['des_location'])){
            $des_location = $_POST['des_location'];
        } else {
            echo "Location is missing or empty!";
            exit();
        }
        if(isset($_POST['des_description']) && !empty($_POST['des_description'])){
            $des_description = $_POST['des_description'];
        } else {
            echo "Description is missing or empty!";
            exit();
        }
        if(isset($_POST['des_price'])){
            $des_price = $_POST['des_price'];
        } else {
            echo "Price is missing or invalid!";
            exit();
        }

        // Check if the 'image' key is set before accessing it
        // Handle image upload
        
        $file = $_FILES['des_image'];
    
        // Check if a file was uploaded
        if (isset($_FILES['des_image']) && $_FILES['des_image']['error'] === 0) {
            $imageData = file_get_contents($_FILES['des_image']['tmp_name']);
        }else{
            echo "Missing or invalid image!";
            exit();
        }

    $db = new dbConnection();
    $db->dbconnt();


    $insert = new Destination($des_name, $des_location, $des_price, $imageData,$des_description);
    
    if($insert->insertData()){
        $_SESSION['status'] ="Data Saved Successfully";
        header('Location: insert_Destination_data.php');
    }else{
        $_SESSION['status'] ="Data not saved Successfully";
    }
    
    }else{
    echo "no any data";
    }

     /*--------------------------------------------------------Insert Data Into Activity Packages-----------------------------------------------------------------*/
    if(isset($_POST['save_act_image'])){
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $Activityname = $_POST['name'];
        } else {
            echo "Name is missing or empty!";
            exit();
        }
        if(isset($_POST['location']) && !empty($_POST['location'])){
            $Activitylocation = $_POST['location'];
        } else {
            echo "Location is missing or empty!";
            exit();
        }
        if(isset($_POST['description']) && !empty($_POST['description'])){
            $Activitydescription = $_POST['description'];
        } else {
            echo "Description is missing or empty!";
            exit();
        }
        if(isset($_POST['price'])){
            $Activityprice = $_POST['price'];
        } else {
            echo "Price is missing or invalid!";
            exit();
        }

        // Check if the 'image' key is set before accessing it
        // Handle image upload
        
        $file = $_FILES['image'];
    
        // Check if a file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }else{
            echo "Missing or invalid image!";
            exit();
        }


    $db = new dbConnection();
    $db->dbconnt();


    $insert = new Activity($Activityname, $Activitylocation, $Activityprice, $imageData,$Activitydescription);
    
    if($insert->insertData()){
        $_SESSION['status'] ="Data Saved Successfully";
        header('Location: insert_Activity_data.php');
    }else{
        $_SESSION['status'] ="Data not saved Successfully";
    }
    
    }else{
    echo "no any data";
    }

    /*--------------------------------------------------------Insert Data Into Tools-----------------------------------------------------------------------------*/
    if(isset($_POST['save_tool_image'])){
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $Toolname = $_POST['name'];
        } else {
            echo "Name is missing or empty!";
            exit();
        }
        if(isset($_POST['description']) && !empty($_POST['description'])){
            $Tooldescription = $_POST['description'];
        } else {
            echo "Description is missing or empty!";
            exit();
        }
        if(isset($_POST['price'])){
            $Toolprice = $_POST['price'];
        } else {
            echo "Price is missing or invalid!";
            exit();
        }

        // Check if the 'image' key is set before accessing it
        // Handle image upload
        
        $file = $_FILES['image'];
    
        // Check if a file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }else{
            echo "Missing or invalid image!";
            exit();
        }


    $db = new dbConnection();
    $db->dbconnt();


    $insert = new Tool($Toolname, $Tooldescription, $imageData, $Toolprice);
    
    if($insert->insertData()){
        $_SESSION['status'] ="Data Saved Successfully";
        header('Location: insert_tools_data.php');
    }else{
        $_SESSION['status'] ="Data not saved Successfully";
    }
    
    }else{
    echo "no any data";
    }


    /*--------------------------------------------------------Insert Data Into Blog-----------------------------------------------------------------------------*/
    if(isset($_POST['save_blog_image'])){
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $Blogname = $_POST['name'];
        } else {
            echo "Name is missing or empty!";
            exit();
        }
        if(isset($_POST['description']) && !empty($_POST['description'])){
            $Blogdescription = $_POST['description'];
        } else {
            echo "Description is missing or empty!";
            exit();
        }

        // Check if the 'image' key is set before accessing it
        // Handle image upload
        
        $file = $_FILES['image'];
    
        // Check if a file was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }else{
            echo "Missing or invalid image!";
            exit();
        }


    $db = new dbConnection();
    $db->dbconnt();


    $insert = new Blog($Blogname, $Blogdescription, $imageData);
    if($insert->insertData()){
        $_SESSION['status'] ="Data Saved Successfully";
        header('Location: insert_Blog.php');
    }else{
        $_SESSION['status'] ="Data not saved Successfully";
    }
    
    }else{
    echo "no any data";
    }

?>