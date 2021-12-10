<?php
include "connect.php";
$infid = $_GET['infid'];
include "editProfileHandle.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="images/logo/logo.png" />

    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css?version=51" />
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <?php
    require('./templates/header.php');
    ?>
</head>

<body>
    <!-- Navigation bar -->
    <div class="bac" style="background: #172134; position:fixed; width:100%; top:0px; z-index:100; margin-bottom:100px;">
        <div class="container" style="padding:10px 0">
            <a href="index.php" class="logo float-left tran4s"><img src="images/logo/logo.png" alt="Logo" style="border-radius:100%; height:56px; width:56px;" /></a>

            <!-- ========================= Theme Feature Page Menu ======================= -->
            <nav class="navbar float-right theme-main-menu one-page-menu">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false" style="margin-top:8px;">
                        <span class="sr-only">Toggle navigation</span>
                        Menu
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1" style="margin-top:10px">
                    <ul class="nav navbar-nav">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="./team.php">Team</a></li>
                        <li><a href="./gallery.php">Gallery</a></li>
                        <li><a href="./registration.php">Register</a></li>
                        <li class="active"><a href="./profile.php">Profile</a>
                        <li>
                        <li><a href="./logout.php">Logout</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- /.theme-feature-menu -->
        </div>
    </div>

    <?php

    if ($showerror == true) {
        echo '<div class="container">
    <div class="alert alert-success alert-dismissible show" role="alert" style="position:relative; top:75px; width:100%; color:red; background: #ff000020;" >
<strong> ' . $showerror . ' </strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
</div>';
    }

    ?>

    <!-- Details -->
    <div class="profile_personal">
        <div class="pro_btn">
            <a href="./profile.php">
                <button>Personal Details</button>
            </a>
            <a href="./editProfile.php">
                <button class="active_pro">Edit profile</button>
            </a>

        </div>
        <div class="pro_details edit_details">
            <h2>Edit Details</h2>
            <hr class="conf_hr">

            <div class="profile_details">
                <strong>
                    <p>Infinito ID</p>
                </strong>
                <p><?php
                    echo $infid;
                    ?></p>
            </div>
            <div class="profile_details">
                <strong>
                    <p>Email</p>
                </strong>
                <p><?php
                    $sql="SELECT * FROM `infinito2021php` where `InfId`='$infid'";
                    $result=mysqli_query($conn,$sql);
                  if ($result) {
                      
                    $row=mysqli_fetch_assoc($result);
                    echo $row['Email'];
                  }
                    ?></p>
            </div>
            <div class="profile_details">
                <strong>
                    <p>College Id/ Roll No.</p>
                </strong>
                <p><?php
                    $sql="SELECT * FROM `infinito2021php` where `InfId`='$infid'";
                    $result=mysqli_query($conn,$sql);
                  if ($result) {
                      
                    $row=mysqli_fetch_assoc($result);
                    echo $row['ID'];
                  }
                    ?></p>
            </div>
            <div class="profile_details">
                <strong>
                    <p>Gender</p>
                </strong>
                <p><?php
                    $sql="SELECT * FROM `infinito2021php` where `InfId`='$infid'";
                    $result=mysqli_query($conn,$sql);
                  if ($result) {
                      
                    $row=mysqli_fetch_assoc($result);
                    echo $row['Gender'];
                  }
                    ?></p>
            </div>
            <form method="post" action=<?php echo $_SERVER['REQUEST_URI'];?>>

            <?php
            $sql="SELECT * FROM `infinito2021php` where `InfId`='$infid'";
            $result=mysqli_query($conn,$sql);
          if ($result) {
              
            $row=mysqli_fetch_assoc($result);
            echo '
                <div class="profile_details">
                    <p><label for="inputPassword3" class="col-form-label">Name</label></p>
                    <div class="edit_fill">
                        <input class="edit-fill-form" type="text" class="form-control" id="inputPassword3" name="name" value="'.$row['Name'].'" required>
                    </div>
                </div>

                
                <div class="profile_details">
                    <p><label for="inputPassword3" class="col-form-label">College Name (FULL)</label></p>
                    <div class="edit_fill">
                        <input class="edit-fill-form" type="text" class="form-control" id="inputPassword3" name="clg" value="'.$row['College'].'" required>
                    </div>
                </div>

                <div class="profile_details">
                    <p><label for="phone" class=" col-form-label">Phone Number</label></p>
                    <div class="edit_fill">
                        <input class="edit-fill-form" type="text" class="form-control" id="inputPassword3" name="phno" value="'.$row['Phone Number'].'" required>
                    </div>
                </div>
                
                
                <div class="profile_details">
                    <p><label for="inputPassword3" class="col-form-label">Password</label></p>
                    <div class="edit_fill">
                        <input class="edit-fill-form" type="password" class="form-control" id="inputPassword3" name="password" value="" required>
                    </div>
                </div>
                <div class="profile_details">
                    <div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </div>

                ';
          }
                ?>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <a href="index.php" class="logo"><img src="images/logo/logo.png" alt="Logo" style="border-radius:100%; height:56px; width:56px;" /></a>

            <ul>
                <li>
                    <a href="https://www.facebook.com/InfinitoIITPatna/" target="_blank" class="tran3s round-border"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/infinito-iit-patna" target="_blank" class="tran3s round-border"><i class="fab fa-linkedin"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/infinito_iitp/" target="_blank" class="tran3s round-border"><i class="fab fa-instagram"></i></a>
                </li>

            </ul>
        </div>
    </footer>


    <!--
    =============================================
		Loading Transition
    ==============================================
    -->
    <div id="loader-wrapper">
        <div id="preloader_1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!-- Scroll Top Button -->
    <button class="scroll-top tran3s p-color-bg">
        <i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i>
    </button>

    <?php
    require('./templates/footer.php');
    ?>


    <script>
        var slideIndex = 0;
        showSlides();



        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

</body>

</html>