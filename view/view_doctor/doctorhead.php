<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>admin dashboard</title>
        <link rel="stylesheet" href="../view_admin/style.css">
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
                    <a href="../../controlleur/controlleur_doctor.php?action=consultation">
                        <i class='bx bx-question-mark' ></i>
                        <span class="elem">My consultations</span>
                    </a>
                </li> 
                <li>
                    <a href="profil_doctor.php">
                        <i class='bx bxs-user-account'></i>
                        <span class="elem">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="../../controlleur/controlleur_doctor.php?action=history">
                        <i class='bx bx-history'></i>
                        <span class="elem">History</span>
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
                <span class="menu"><?php echo $_SESSION['first_name']; ?></span>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            </nav>