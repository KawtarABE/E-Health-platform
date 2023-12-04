<?php
    class view_see{
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
                                <a href="controlleur_user.php?action=consultations">
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
            ';
        }

        public function see($consultation,$cathegorie){
            $this->content.='
            <div class="article">
                <div class="left">
                    <p class="date">'.$consultation['date'].'</p>
                    <h1>'.$consultation['Description'].'</h1>
                    <p class="description">'.$consultation['Post'].'</p>
                    <p class="cathegory">Cathegory: '.$cathegorie.'</p>
                    <p class="patient">'.$consultation['patient'].'</p>
                </div> ' ;
        }

        public function see_more($consultations,$cathegorie){ 
            $i=0;
            foreach($consultations as $consultation){
                $i+=1;
                $this->content.='<div class="right">
                                    <h1>Answer N°'.$i.'</h1>        
                                    <p class="answer">'.$consultation['answer'].'</p>
                                    <p class="doctor">'.$consultation['first_name']."  ".$consultation['last_name'].'</p>
                                </div>';
            }
        }

        public function no_answers(){
            $this->content.='<div class="no">No answer yet</div>';
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
    margin-left: 30px;
    font-size: 25px;
    font-weight: 500px;
    color: #66b0FF;
    text-transform: capitalize;
    text-align: center;
    margin-top: 40px;
}

.article .left{
    margin-top:43px; 
    max-width: 90%;
    margin-left: 65px;
    background-color: #fff ;
    height: 250px;
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(152, 173, 203, 0.1);
}

.article .left p{
    margin: 15px;
    font-size: 14px;
    font-weight: 200px;
    color:black;
}

.article .left h1{
    margin-top: 0%;
    margin-bottom: 8px;
    margin-left: 13px;
    font-size: 25px;
    font-weight: 500px;
    color:#5482d7;
}

.article .left p.date{
    padding: 20px;
    color: #7f7e7e;
    font-size: 18px;
    font-weight: 500;
}

.article .left p.description{
    margin-bottom: 10px;
    color: #2d2d2d;
    font-size: 17px;
}

.article .left p.cathegory{
    color: #7f7e7e;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 30px;
}

.article .left p.patient{
    color: #7f7e7e;
    font-size: 18px;
    font-weight: 400;
    margin-left: 700px;
}


.article .right{
    margin-top:43px; 
    max-width: 50%;
    margin-left: 280px;
    background-color: #fff ;
    /* height: 210px; */
    width: calc(50% - 8px);
    border-radius: 8px;
    box-shadow: 0 5px 10px rgba(152, 173, 203, 0.1);
}


.article .right p{
    margin: 15px;
    font-size: 14px;
    font-weight: 200px;
    color:black;
}

.article .right h1{
    padding: 20px;
    /* margin-top: 40px; */
    margin-bottom: 8px;
    margin-left: 13px;
    font-size: 25px;
    font-weight: 500px;
    color:#5482d7;
}

.article .right p.answer{
    margin-bottom: 10px;
    color: #2d2d2d;
    font-size: 17px;
}

.article .right p.doctor{
    color: #7f7e7e;
    font-size: 18px;
    font-weight: 400;
    margin-left: 400px;
}

.no {
    margin-top: 40px;
    font-size: 25px;
    font-weight: 600px;
    text-align: center;
    padding: 30px;
    color:#7f7e7e; 
}

</style>
