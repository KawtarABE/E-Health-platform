<?php
    class view_users{
        protected $content;
        protected $title;
        public function __construct($title) {
            $this->title=$title;
            $this->content='
            <html>
            <head>
                <title>'.$this->title.'</title><html lang="en" dir="ltr">
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
                    <a href="../view/view_admin/dashboard.php">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="elem">Dashboard</span>
                    </a>
                </li> 
                    <li>
                        <a href="../view/view_admin/profil.php">
                            <i class="bx bxs-user-account"></i>
                            <span class="elem">Profil</span>
                        </a>
                    </li> 
                    <li>
                        <a href="controlleur_admin.php?action=users">
                            <i class="bx bx-user"></i>
                            <span class="elem">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="controlleur_admin.php?action=doctors">
                            <i class="bx bx-injection"></i>
                            <span class="elem">Doctors</span>
                        </a>
                    </li>
                    <li>
                        <a href="controlleur_admin.php?action=maladies">
                            <i class="bx bx-capsule"></i>
                            <span class="elem">Maladies</span>
                        </a>
                    </li>
                    <li>
                        <a href="controlleur_admin.php?action=cathegories">
                            <i class="bx bxs-category"></i>
                            <span class="elem">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="controlleur_admin.php?action=consultations">
                            <i class="bx bx-question-mark"></i>
                            <span class="elem">Consultations</span>
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
                    <span class="menu">Dashboard</span>
                </div>
                <div class="search">
                    <input type="text" name="search" placeholder="Search...">
                    <i class="bx bx-search"></i>
                </div>
                </nav>   
                <h1 class="tab">All patients</h1>
                <div class="table">
                    <table>
                        <div class="color">
                            <thead>
                            <tr>
                                <th>N° user</th>
                                <th>Email</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>sexe</th>
                                <th>Date of birth</th>
                                <th>Delete</th>
                            </tr>   
                            </thead>
                        </div>
                        <tbody>
            
            ';
        }

        public function users($users){
            foreach($users as $user){
                $this->content.='<tr>
                                    <td>'.$user['id'].'</td>
                                    <td>'.$user['email'].'</td>
                                    <td>'.$user['first_name'].'</td>
                                    <td>'.$user['last_name'].'</td>
                                    <td>'.$user['sexe'].'</td>
                                    <td>'.$user['date_of_birth'].'</td>
                                    <td><a href="controlleur_admin.php?action=delete_user&id_user='.$user['id'].'" class="btn">delete</a></td>
                                </tr>';
                            
            }
        }

        public function getContent() {
            return $this->content;
        }
        public function finirContent() {
            $this->content.='</tbody>
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

h1 {
    margin-bottom: 20px;
    font-size: 25px;
    font-weight: 500px;
    color: #66b0FF;
    text-transform: capitalize;
    text-align: center;
    margin-top: 50px;
}

.table{
    /* height: 600px; */
    margin-left: 80px;
    padding: 30px 20px;
    width: calc(90%);
    display: flex;
    align-items: center;
    text-align: left;
    background: #fff ;
    border-radius: 12px;
    justify-content: center;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

.color {
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    font-size: 18px;
    align-items: center;
    border : 1px solid #999;
}

table thead{
    background-color: #66b0FF;
    color: white;
    width: 100%;
    /*height: 30px; */
}

table thead th{
    padding: 10px;
}

table tbody td{
    padding: 7px;
    border : 1px solid #999;

}

table tbody tr{
    margin-bottom: 25px;
    
}

table tbody tr{
    text-align:  center;
    margin-top: 100px;
}

.btn{
    font-family: "roboto", sans-serif;
    text-transform: capitalize;
    font-size: 15px;
    border:0;
    border-radius: 5px;
    color: #fff;
    background:#b784a7;
    padding: 5px 15px;
    cursor: pointer;
    margin-top: 10px;;
    margin-bottom: 20px;
    /* margin-top: 60px;*/
    text-decoration: none;
}

.btn:hover {
    background-color: #0d3073; 
}

.add{
    margin-top: 40px;
}

.add a{
    margin-left: 745px;
    font-size: 18px;
    font-weight: 400;
    color: #fff;
    background: #008080;
    padding: 10px 15px;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
}

.add a:hover{
    background-color: #0d3073; 
}

.add i{
    font-size: 18px;
    font-weight: 500px;
    margin-right: 5px;
    color: white;
}
</style>
