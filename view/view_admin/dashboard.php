<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>admin dashboard</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <div class="design">
            <div class="logo">
            <i class='bx bx-pulse'></i>
             E-health
            </div>
            <ul class="list">
                <li>
                    <a href="dashboard.php">
                        <i class='bx bxs-grid-alt'></i>
                        <span class="elem">Dashboard</span>
                    </a>
                </li> 
                <li>
                    <a href="profil.php">
                        <i class='bx bxs-user-account'></i>
                        <span class="elem">Profil</span>
                    </a>
                </li> 
                <li>
                    <a href="../../controlleur/controlleur_admin.php?action=users">
                        <i class='bx bx-user'></i>
                        <span class="elem">Users</span>
                    </a>
                </li>
                <li>
                    <a href="../../controlleur/controlleur_admin.php?action=doctors">
                        <i class='bx bx-injection'></i>
                        <span class="elem">Doctors</span>
                    </a>
                </li>
                <li>
                    <a href="../../controlleur/controlleur_admin.php?action=maladies">
                        <i class='bx bx-capsule'></i>
                        <span class="elem">Maladies</span>
                    </a>
                </li>
                <li>
                    <a href="../../controlleur/controlleur_admin.php?action=cathegories">
                        <i class='bx bxs-category' ></i>
                        <span class="elem">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="../../controlleur/controlleur_admin.php?action=consultations">
                        <i class='bx bx-question-mark' ></i>
                        <span class="elem">Consultations</span>
                    </a>
                </li>          
                <li>
                    <a href="../../index.html">
                        <i class='bx bx-log-out'></i>
                        <span class="elem">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
        <section class="home">
            <nav>
            <div class="dashboard">
                <i class='bx bx-menu designBtn'></i>
                <span class="menu">Dashboard</span>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            </nav>
            <div class="home_content">
                <div class="overview-boxes">
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Number of users</div>
                            <div class="number">
                               <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("select count(*) from patients") ;
                                    $query->execute();
                                    $row = $query->fetch() ;
                                    echo $row[0] ;
                                ?><i class='bx bx-user-pin' ></i>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Number of doctors</div>
                            <div class="number">
                               <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("select count(*) from doctors") ;
                                    $query->execute();
                                    $row = $query->fetch() ;
                                    echo $row[0] ;
                                ?><i class='bx bx-first-aid'></i>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Total consultations</div>
                            <div class="number">
                               <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("select count(*) from forum") ;
                                    $query->execute();
                                    $row = $query->fetch() ;
                                    echo $row[0] ;
                                ?><i class='bx bx-message-square-edit'></i>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Total answered</div>
                            <div class="number">
                               <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("select count(*) from forum where statut='answered'") ;
                                    $query->execute();
                                    $row = $query->fetch() ;
                                    echo $row[0] ;
                                ?><i class='bx bx-message-alt-check'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="consultation">
                <div class="recent">
                    <div class="title">Recent 5 consultations</div>
                    <div class="consultations_details">
                        <ul class="details">
                            <li class="colonne">Date</li>
                            <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("SELECT date FROM FORUM order by date desc limit 5") ;
                                    $query->execute();
                                    $row = $query->fetchAll() ;
                                    foreach($row as $date){
                                        echo "<li>".$date[0]."</li>";
                                    }
                            ?>
                        </ul>
                        <ul class="details">
                            <li class="colonne">Patient</li>
                            <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("SELECT patient FROM FORUM order by date desc limit 5") ;
                                    $query->execute();
                                    $row1 = $query->fetchAll() ;
                                    foreach($row1 as $user){
                                        echo "<li>".$user[0]."</li>";
                                    }
                            ?>
                        </ul>
                        <ul class="details">
                            <li class="colonne">Post</li>
                            <?php 
                                    $db=new PDO('mysql:host=localhost;dbname=pfa','root','');
                                    $query = $db->prepare("SELECT post FROM FORUM order by date desc limit 5") ;
                                    $query->execute();
                                    $row2 = $query->fetchAll() ;
                                    foreach($row2 as $question){
                                        echo "<li>".substr_replace($question[0],'...',50)."</li>";
                                    }
                            ?>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="../../controlleur/controlleur_admin.php?action=consultations">See All</a>
                    </div>
                </div>
            </div>
        </section>
        <script src="script.js"></script>
    </body>
</html>