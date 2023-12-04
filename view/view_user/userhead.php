<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>user dashboard</title>
        <link rel="stylesheet" href="../view_admin/style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <div class="design">
            <div class="logo">
            <i class='bx bx-pulse'></i>
             E-Health
            </div>
            <ul class="list">
                <li>
                    <a href="user.php">
                        <i class='bx bxl-blogger'></i>
                        <span class="elem">Blog</span>
                    </a>
                </li> 
                <li>
                    <a href="profil.php">
                        <i class='bx bxs-user-account'></i>
                        <span class="elem">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="./../../controlleur/controlleur_user.php?action=maladies">
                        <i class='bx bx-heart'></i>
                        <span class="elem">My health</span>
                    </a>
                </li>  
                <li>
                    <a href="./../../controlleur/controlleur_user.php?action=consultations">
                        <i class='bx bx-history' ></i>
                        <span class="elem">My consultations</span>
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
                <?php echo $_SESSION['first_name']; ?>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            </nav>
    
