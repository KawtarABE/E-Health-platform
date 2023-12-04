<?php
    class view_see_profil{
        protected $content;
        protected $title;
        public function __construct($title) {
            $this->title=$title;
            $this->content.='
            <html>
            <head>
                <title>'.$this->title.'<html lang="en" dir="ltr">
                <head>
                    <meta charset="UTF-8">
                    <title>admin dashboard</title>
                    <link rel="stylesheet" href="../view_admin/style.css">
                    <meta name="viewport" content="width=device-width,initial-scale=1.0">
                    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"> 
                </head>
                <body>
                    <div class="design">
                        <div class="logo">
                        <i class="bx bx-pulse"></i>
                         E-health
                        </div>
                        <ul class="list">
                            <li>
                                <a href="controlleur_doctor.php?action=consultation">
                                    <i class="bx bx-question-mark"></i>
                                    <span class="elem">My consultations</span>
                                </a>
                            </li> 
                            <li>
                                <a href="../view/view_doctor/profil_doctor.php">
                                    <i class="bx bxs-user-account"></i>
                                    <span class="elem">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="controlleur_doctor.php?action=history">
                                    <i class="bx bx-history"></i>
                                    <span class="elem">History</span>
                                </a>
                            </li>         
                            <li>
                                <a href="../index.html">
                                    <i class="bx bx-log-out"></i>
                                    <span class="elem">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <section class="home">
                        <nav>
                        <div class="dashboard">
                            <i class="bx bx-menu designBtn"></i>
                            <span class="menu">'.$_SESSION['first_name'].'</span>
                        </div>
                        <div class="search">
                            <input type="text" name="search" placeholder="Search...">
                            <i class="bx bx-search"></i>
                        </div>
                        </nav>
                        <div class="content">
                ';
        }

        public function see_profil($profil,$maladies){
            $first_name=$profil['first_name'];
            $last_name=$profil['last_name'];
            $sexe=$profil['sexe'];
            $date_of_birth=$profil['date_of_birth'];
            $this->content.='
                <h1>Patient profil</h1>
                <div class="article">
                        <h4>Full name: </h4><p class="elemnt">'.$first_name.'  '.$last_name.'</p>
                        <h4>Date_of_birth: </h4><p class="elemnt">'.$date_of_birth.'</p>
                        <h4>Sexe: </h4><p class="elemnt">'.$sexe.'</p>
                        <h4>List of maladies: </h4>
                            <ul>';
            foreach($maladies as $maladie){
                $this->content.='<li>'.$maladie['name_of_maladie'].'</li>';

            }
            $this->content.='</div>';
        }

        public function getContent() {
            return $this->content;
        }
        public function finirContent() {
            $this->content.='
            <script src="../view/view_admin/script.js"></script></body></html>';
        }
        public function afficher() {
            $this->finirContent();
            echo $this->getContent();
        }
}
?>

<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
    text-transform: capitalize;
    text-decoration: none;
    list-style: none;
}

body{
    min-height: 100vh;
    width: 100%;
}

.design {
    position: fixed;
    height: 100%;
    width: 240px;
    background: #448ece;
    transition: all 0.5s ease;
}

.design.active{
    width: 60px;
}

.design .logo {
    height: 80px;
    width: 100%;
    display: flex;
    font-size: 28px;
    font-weight: 600;
    color: #fff;
    align-items: center;
    margin-left: 25px;
}

.header .logo i{
    color: white;
    font-weight: 500px;
    margin-right: 30px;
}

.design .logo.active {
    margin-left: 60px;
}

.design .list{
    margin-top: 30px;
}

.design .list li{
    height: 70px;
    width: 100%;
    list-style: none;
}

.design .list li a{
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: all 0.4s ease;
}

.design .list li a:hover{
    background: #8ea0c2;
}

.design .list li a i{
    min-width: 80px;
    text-align: center;
    color: white;
    font-size:18px;
}

.design .list li a .elem{
    color: white;
    font-size: 16px;
    font-weight: 480;
    font-family: Arial;

}

.home {
    background: #f5f5f5;
    position: relative;
    min-height: 100vh;
    width: calc(100% - 240px);
    left: 240px;
    transition: all 0.5s ease; 
}

.design.active ~ .home {
    width: calc(100% - 60px);
    left: 60px;
}


.home nav {
    height: 80px;
    background: #fff;
    padding: 0 20px;
    display: flex ;
    align-items: center;
    justify-content: space-between;
}


.home nav .dashboard {
    display: flex;
    align-items: center;
    font-size: 24px;
    font-weight: 500;
}

.home nav .dashboard i{
    font-size: 35px;
    margin-right: 10px;
}

.home nav .search {
    height: 40px;
    width: 400px;
    margin: 0 20px;
    position: relative;
}

.home nav .search input{
    position: absolute;
    height: 100%;
    width: 100%;
    border-radius: 6px;
    padding: 0 15px;
    font-size: 17px;
    background: #F5F6FA;
    border: 2px solid #EFEEF1;
}

.home nav .search .bx-search{
    position: absolute;
    right: 1.5px;
    top: 50%;
    transform: translateY(-50%);
    height: 37px;
    width: 40px;
    background: #2697FF;
    border-radius: 6px;
    color: white;
    font-size: 22px;
    line-height: 37px;
    text-align: center;
}

.home h1 {
    /* margin-bottom: 20px; */
    font-size: 25px;
    font-weight: 500px;
    color: #66b0FF;
    text-transform: capitalize;
    text-align: center;
    margin-top: 40px;
}

.article {
    margin-top:30px; 
    max-width: 70%;
    margin-left: 350px;
    background-color: #fff ;
    height: 470px;
    width: 35%;
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(152, 173, 203, 0.1);
}

.article p{
    margin: 15px;
    font-size: 14px;
    font-weight: 200px;
    color:black;
}

.article h4{
    padding: 10px;
    margin-left: 13px;
    font-size: 18px;
    font-weight: 500px;
    color:black;
}

.article p{
    color: #7f7e7e;
    margin-left: 70px;
    font-size: 18px;
    font-weight: 500;
}

.article li{
    padding: 7px;
    color: #7f7e7e;
    margin-left: 70px;
    font-size: 18px;
    font-weight: 500;
}

</style>
