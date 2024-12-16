<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="new index.css">
    <title>new indwx</title>
</head>
<body>
    <div class="all"> 
        <nav>
            <h2 class = "CampGo">Camp Go</h2>
            <ul>
                <li><a href="#">Camping Site</a></li>
                <li><a href="#">Equipment</a></li>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Activity Packages</a></li>
            </ul>
            <img src="img/defult.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="img/146-1468281_profile-icon-png-transparent-profile-picture-icon-png.png" alt="">
                        <h2>Jone</h2>
                    </div>
                    <hr>

                    <a href="EditProfile.php" class="sub-menu-link">
                        <img img class="contactus" src="img/edit.png" alt="">
                        <P>  Edit Profile</P>
                        <span>></span>
                    </a>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img  class="contactus" src="img/settings.png" alt="">
                        <P>Change Password</P>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img  class="contactus" src="img/exit_3456192.png" alt="">
                        <P>Log Out</P>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>


        <section class="Info" id="Info">
        <div class="content">
            <h1>Welcome to a global icon of diversity. </h1>
        </div>
    </section>

    <div class="video-container">
        <video src="video/Vid02.mp4" id="video" loop autoplay muted></video>

    </div>
        

    </div>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>