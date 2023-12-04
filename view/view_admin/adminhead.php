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