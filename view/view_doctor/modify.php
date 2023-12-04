<?php 
    require 'C:\xampp\htdocs\pfa\controlleur\controlleur_doctor.php';
    /*echo $_SESSION['first_name'];*/
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>user profil</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <?php 
            include 'doctorhead.php'; 
            $id_question = $_GET['id_question'];
            $id_doctor = $_GET['id_doctor'];
            $answer = $_GET['answer'];
        ?>
        <div class="answer">
            <form action="../../controlleur/controlleur_doctor.php?action=modify&id_question=<?php echo $id_question;?>&id_doctor=<?php echo $id_doctor;?>" method="post">
                <h3>Answer</h3>
                <textarea name="answer" placeholder="<?php echo $answer; ?>" class="box"></textarea>
                <input type="submit" name="submit" value="Publish" class="btn">
            </form>
        </div>
    </body>
</html>