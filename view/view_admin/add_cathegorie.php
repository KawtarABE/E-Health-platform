<?php 
    require 'C:\xampp\htdocs\pfa\controlleur\controlleur_admin.php';
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>New categorie</title>
        <link rel='stylesheet' href='style1.css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <?php include 'adminhead.php'; ?>
        <div class="ask">
            <form action="../../controlleur/controlleur_admin.php?action=new_cathegorie" method="post">
                <h3>New categorie</h3>
                <input type="text" name="cathegorie" placeholder="enter new cathegorie.." class="box">
                <input type="submit" name="submit" value="Publish" class="btn">
            </form>
        </div>
    </body>



        <?php include 'adminfooter.php'; ?>
</html>