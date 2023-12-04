<?php 
    require 'C:\xampp\htdocs\pfa\controlleur\controlleur_doctor.php';
    /*echo $_SESSION['first_name'];*/
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>user profil</title>
        <link rel="stylesheet" href="..\view_user\style2.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <?php include 'doctorhead.php'; ?>
        <div class="container">
            <div class="leftbox">
                <div class="elements">
                    <i class='bx bx-user'></i>
                    <i class='bx bx-calendar'></i>
                    <i class='bx bx-male-female'></i>
                    <i class='bx bxl-gmail' ></i>  
                </div>
            </div>
            <div class="rightbox">
                <div class="profile">
                    <form method="post" action="../../controlleur/controlleur_doctor.php?action=modify_profil">
                    <h1>Personal Info</h1>
                    <h4>First name</h4>
                    <input type="text" name="first_name" class="input" value="<?php echo $_SESSION['first_name']; ?>">
                    <h4>last name</h4>
                    <input type="text" name="last_name" class="input" value="<?php echo $_SESSION['last_name']; ?>">
                    <h4>Gender</h4>
                    <input type="text" name="sexe" class="input" value="<?php echo $_SESSION['sexe']; ?>">
                    <h4>Email</h4>
                    <input type="text" name="email" class="input" value="<?php echo $_SESSION['email']; ?>">
                    <h4>cathegory</h4>
                    <input type="text" name="cathegory" class="input" value="<?php echo $_SESSION['cathegory']; ?>">
                    <h4>Password</h4>
                    <input type="password" name="password" class="input" value="<?php echo $_SESSION['password']; ?>">
                    <a class="btn"><input type="submit" name="submit" value="Update profil" class="submit"><div class="tootlip">Modify in the previous fields</div></a>
                    </form>             
                </div>
            </div>
        </div>
        <?php include '../view_user/userfooter.php' ;?>
    </body>
</html>
