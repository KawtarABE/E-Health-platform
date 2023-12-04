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
        <?php 
            include 'userhead.php';
            $id_consultation=$_GET['id_question'];
            $description=$_GET['description'];
            $post=$_GET['question'];
            // $type=$_GET['type'];
         ?>
        <div class="ask">
            <form action="../../controlleur/controlleur_user.php?action=update_consult&id_consultation=<?php echo $id_consultation;?>" method="post">
                <h3>Modify consultation</h3>
                <input type="text" name="description" value="<?php echo $description;?>" class="box">
                <textarea type="consultation" name="consultation" placeholder="<?php echo $post;?>" class="box"></textarea>
                <select class="box" name="type" value="<?php echo $type;?>">
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