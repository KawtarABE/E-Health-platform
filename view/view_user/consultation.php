<?php
    class view_consultation{
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
                                <a href="../view/view_user/user.php">
                                    <i class="bx bxl-blogger"></i>
                                    <span class="elem">Blog</span>
                                </a>
                            </li> 
                            <li>
                                <a href="../view/view_user/profil.php">
                                    <i class="bx bxs-user-account"></i>
                                    <span class="elem">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="controlleur_user.php?action=maladies">
                                    <i class="bx bx-heart"></i>
                                    <span class="elem">My health</span>
                                </a>
                            </li>  
                            <li>
                                <a href="">
                                    <i class="bx bx-history" ></i>
                                    <span class="elem">My consultations</span>
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
                            <i class="bx bx-menu designBtn"></i>'.
                            $_SESSION["first_name"].'
                        </div>
                        <div class="search">
                            <input type="text" name="search" placeholder="Search...">
                            <i class="bx bx-search"></i>
                        </div>
                        </nav>
                        <h1></h1>
                        <div class="content">

            ';
        }

        public function my_consultations($consultations) {
            $this->content.='      
            <div class="add">
                <a href="../view/view_user/add_consultation.php"><i class="bx bx-plus"></i>consultation</a>
            </div>';
            foreach($consultations as $consultation){
                $this->content.='
                <div class="article">
                    <div class="left">
                        <img src="../view/view_user/img1.png">
                    </div>
                    <div class="right">
                        <p class="date">'.$consultation['date'].
                        '<h1>'.$consultation['Description'].'</h1>
                        <p class="description">'.substr_replace($consultation['Post'],'...',100).'</p>
                        <p class="statut">'.$consultation['statut'].'</p>
                        <div class="more">
                            <a class="btn1" href="controlleur_user.php?action=see&id_question='.$consultation['id'].'">See more</a>
                            <a class="btn2" href="controlleur_user.php?action=delete_consultation&id_question='.$consultation['id'].'">Delete</a>
                            <a class="btn3" href="../view/view_user/update_consultation.php?id_question='.$consultation['id'].'&description='.$consultation['Description'].'&question='.$consultation['Post'].'&type='.$consultation['type'].'">Update</a>
                        </div>
                    </div>
                </div>';
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

.home h1 {
    /* margin-bottom: 20px; */
    font-size: 25px;
    font-weight: 500px;
    color: #66b0FF;
    text-transform: capitalize;
    text-align: center;
    margin-top: 40px;
}

.article{
    display: flex;
    flex-wrap: wrap;
}

.article .left img{
    height: 300px;
    width: 400px;
}

.article .right{
    margin-top:43px; 
    max-width: 50%;
    margin-left: 40px;
    background-color: #fff ;
    height: 210px;
    width: calc(50% - 8px);
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(152, 173, 203, 0.1);
}

.article .right h1{
    margin-top: 0%;
    margin-bottom: 8px;
    margin-left: 13px;
    font-size: 23px;
    font-weight: 500px;
    color:#5482d7;
}

.article .right p{
    margin: 15px;
    font-size: 14px;
    font-weight: 200px;
    color:black;
}

.article .right p.date{
    margin-bottom: 10px;
    color: #7f7e7e;
    font-size: 16px;
    font-weight: 400;
}

.article .right p.description{
    margin-bottom: 10px;
    color: #2d2d2d;
    font-size: 17px;
}

.article .right p.statut{
    color: #7f7e7e;
    font-size: 16px;
    font-weight: 400;
}

.more {
  position: relative;
  display:  flex;
  flex-direction: row;
  width: 100%;
  justify-content: right;
  column-gap: 5px;
  
}


.article .right .more a{
    position: relative;
    font-size: 16px;
    font-weight: 400;
    color: #fff;
    padding: 5px 7px;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
    margin-right : 10px;
    
}

.right .more .btn1{
    background: #5482d7;
}

.right .more .btn2{
    background: #b784a7;
}

.right .more .btn3{
    background: #008080;
} 

.article .more a:hover{
    background-color: #0d3073; 
}

.add a{
    margin-top: 3px;
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
