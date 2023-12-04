<html lang="en" dir="ltr">
    <?php include 'C:\xampp\htdocs\pfa\controlleur\controlleur_user.php' ;?>
    </html>
    <head>
        <meta charset="UTF-8">
        <title>user dashboard</title>
        <link rel="stylesheet" href="styling.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <?php 
         include 'userhead.php' ;
        ?>
        <section class="articles">
            <?php 
                $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                $query = $db->prepare("select * from forum where type='public'") ;
                $query->execute();
                $posts = $query->fetchAll() ;
                foreach($posts as $post){
                    $id=$post['id'];
            ?>
            <div class="article">
                <div class="left">
                    <img src="img.png">
                </div>
                <div class="right">
                    <p class="date"><?php echo $post['date']; ?>
                    <h1><?php echo $post['Description']; ?></h1>
                    <p class="description"><?php echo substr_replace($post['Post'],'...',100); ?></p>
                    <p class="auteur"><?php echo $post['patient']; ?></p>
                    <div class="more">
                    <a href="../../controlleur/controlleur_user.php?action=see&id_question=<?php echo $id; ?>">See more</a>
                </div>
                </div>
            </div>


            <?php } ?>
        </section>
        <?php include 'userfooter.php' ;?>
    </body>
</html>