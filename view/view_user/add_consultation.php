<?php 
    require 'C:\xampp\htdocs\pfa\controlleur\controlleur_user.php';
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>user profil</title>
        <link rel='stylesheet' href='style3.css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <?php include 'userhead.php'; ?>
        <div class="ask">
            <form action="../../controlleur/controlleur_user.php?action=new_consult" method="post">
                <h3>New consultation</h3>
                <input type="text" name="description" placeholder="enter description.." class="box">
                <textarea type="consultation" name="consultation" placeholder="enter your consultation.." class="box"></textarea>
                <select class="box" name="type">
                    <option name="type">public</option>
                    <option name="type">private</option>
                </select>
                <select class="box" name="cathegory">
                    <option>Addiction_medicine</option>
                    <option>Cardiology </option>
                    <option>Dentistry</option>
                    <option>Obstetrics</option>
                    <option>Neurology</option>
                    <option>Psychiatry</option>
                    <option>general</option>
                    <option>Allergist</option>
                    <option>eyes</option>
                    <option>ears</option>
                </select>
                <input type="submit" name="submit" value="Publish" class="btn">
            </form>
        </div>
    </body>



        <?php include 'userfooter.php'; ?>
</html>