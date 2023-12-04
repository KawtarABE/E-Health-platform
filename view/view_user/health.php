<?php
    class view{
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
                                <a href="">
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
                        <h1>List of maladies</h1>
                        <div class="table">
                            <table>
                                <div class="color">
                                    <thead>
                                    <tr>
                                        <th>N° maladie</th>
                                        <th>Name of Maladie</th>
                                        <th>Affected by maladie</th>
                                        <th>Add</th>
                                        <th>Delete</th>
                                    </tr>   
                                    </thead>
                                </div>
                                <tbody>
            ';
        }

        public function maladies($maladies){
            $id = $_SESSION['id_user'];
            $db =new PDO('mysql:host=localhost;dbname=pfa','root','');
            foreach($maladies as $maladie){
                $id_maladie = $maladie['id_maladie'];
                $query = $db->prepare("select count(*) from patient_maladie where id_patient = $id and id_maladie = $id_maladie");
                $query->execute();
                $result = $query->fetch();
                if($result[0] > 0){
                    $statut = "yes";
                } else{ 
                    $statut = "non";
                }
                $this->content.='<tr>
                                    <td>'.$maladie['id_maladie'].'</td>
                                    <td>'.$maladie['name_of_maladie'].'</td>
                                    <td>'.$statut.'<td><a href="controlleur_user.php?action=add_maladie&id_patient='.$id.'&id_maladie='.$id_maladie.'" class="btn1">Add</a></td>
                                    <td><a href="controlleur_user.php?action=delete_maladie&id_patient='.$id.'&id_maladie='.$id_maladie.'" class="btn2">Delete</a></td>
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
    /* margin-bottom: 20px; */
    font-size: 25px;
    font-weight: 500px;
    color: #66b0FF;
    text-transform: capitalize;
    text-align: center;
    margin-top: 40px;
}

.table{
    height: 600px;
    margin-top: 20px;
    margin-left: 100px;
    padding: 30px 20px;
    width: calc(80%);
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
    font-size: 20px;
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

/* table th{
    border: 1px solid #2697FF;

} */

table tbody tr{
    text-align:  center;
    margin-top: 100px;
}

.btn1{
    font-family: "roboto", sans-serif;
    text-transform: capitalize;
    font-size: 15px;
    border:0;
    border-radius: 5px;
    color: #fff;
    background: #008080;
    padding: 5px 15px;
    cursor: pointer;
    margin-top: 10px;;
    margin-bottom: 20px;
    /* margin-top: 60px;*/
    text-decoration: none;
}

.btn1:hover {
    background-color: #0d3073; 
}

.btn2{
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

.btn2:hover {
    background-color: #0d3073; 
}
</style>
