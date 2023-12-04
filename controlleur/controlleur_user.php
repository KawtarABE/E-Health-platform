<?php

use LDAP\Result;

    include 'C:\xampp\htdocs\pfa\model\model_user.php';
    class controlleur_user{
        private $model;
        private $action;
        private $view;
        public static $user;
        public static $maladies;
        
        public function __construct() { 
            $this->model = new model_user() ;
            $this->action='all';
        }

        public function authentification() {
            if(!empty($_POST['user'])&&!empty($_POST['password'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $row = $this->model->login_user(array($user));
                if ($password==$row['password']){
                    $_SESSION['auth']=true;
                    $_SESSION['email']=$user;
                    $_SESSION['id_user']=$row['id'];
                    $_SESSION['first_name']=$row['first_name'];
                    $_SESSION['last_name']=$row['last_name'];
                    $_SESSION['sexe']=$row['sexe'];
                    $_SESSION['date_of_birth']=$row['date_of_birth'];
                    $_SESSION['password']=$password;
                    header('location:..\view\view_user\user.php');
                }
                else {
                    echo "<script>alert('password or email incorrecte, please try again');window.location='../view/view_user/login.html'</script>"; /*header('location:..\view\view_user\login.html');*/
                }
            }
            else {
                header('location:..\view\view_user\login.html');
            }
        }

        public function first_register() {
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $user=$_POST['email'];
            $date=$_POST['date'];
            $password=$_POST['password'];
            $password1=$_POST['password1'];
            $sexe=$_POST['sex'];
            $registredUser = $this->model->test_user($user);
            if(sizeof($registredUser)) {    
                echo "<script>alert('user alrady token. Please change it and retry');window.location='../view/view_user/register.html'</script>";
            }
            if($password1 != $password){
                echo "<script>alert('unmatched passwords');window.location='../view/view_user/register.html'</script>";
            }
            else{
                $result=$this->model->first_register($user,$password,$first_name,$last_name,$sexe,$date);
                if($result) {
                    echo "<script>alert('You are successfuly regitered. Please log in and complete your health informations');window.location='../view/view_user/login.html'</script>";
                }
            }
        }

        public function modify_profil(){
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $date_of_birth=$_POST['date_of_birth'];
            $email=$_POST['email'];
            $sexe=$_POST['sexe'];
            $password=$_POST['password'];
            $user=$_SESSION['id_user'];
            $result=$this->model->update_profil($email,$password,$first_name,$last_name,$date_of_birth,$sexe,$user);
            echo $result;
            if($result){
                $_SESSION['auth']=true;
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                $_SESSION['first_name']=$first_name;
                $_SESSION['last_name']=$last_name;
                $_SESSION['sexe']=$sexe;
                $_SESSION['date_of_birth']=$date_of_birth;
                echo "<script>alert('Modification successfuly done. Go back to your profil');window.location='../view/view_user/profil.php'</script>"; 
            }
        }

         public function maladies(){
            include 'C:\xampp\htdocs\pfa\view\view_user\health.php';
            $maladies = $this->model->maladies();
            $this->view =new view("health");
            $this->view->maladies($maladies);
            $this->view->afficher();
        }

        public function add_maladie() {
            $id_patient=$_GET['id_patient'];
            $id_maladie=$_GET['id_maladie'];
            $result = $this->model->test_maladie($id_patient,$id_maladie);
            if($result[0]==0) {
                $this->model->add_maladie($id_patient,$id_maladie);
                header('location:controlleur_user.php?action=maladies');
            }
            else{
                echo "<script>alert('Maladie alrady declared');window.location='controlleur_user.php?action=maladies'</script>";
            }
        }

        public function delete_maladie() {
            $id_patient=$_GET['id_patient'];
            $id_maladie=$_GET['id_maladie'];
            $result = $this->model->test_maladie($id_patient,$id_maladie);
            if($result[0]==1) {
                $this->model->delete_maladie($id_patient,$id_maladie);
                header('location:controlleur_user.php?action=maladies');
            }
            else{
                echo "<script>alert('Maladie is not declared yet');window.location='controlleur_user.php?action=maladies'</script>";
            }

        }

        public function consultations(){
            include 'C:\xampp\htdocs\pfa\view\view_user\consultation.php';
            $patient=$_SESSION['email'];
            $consultations = $this->model->consultations($patient);
            $this->view =new view_consultation("health");
            $this->view->my_consultations($consultations);
            $this->view->afficher();
        }

        public function see(){
            include 'C:\xampp\htdocs\pfa\view\view_user\view_see.php';
            $id_question = $_GET['id_question'];
            $consultation = $this->model->see_more($id_question);
            $consultations = $this->model->see($id_question);
            $id = $consultation['id_categorie'];
            $cathegory = $this->model->name_cathegory($id);
            $this->view= new view_see("See more");
            $this->view->see($consultation,$cathegory[0]);
            if($consultations!=NULL){
                $this->view->see_more($consultations,$cathegory[0]);
            }
            else{
                $this->view->no_answers();
            }
            $this->view->afficher();

        }


        public function new_consult(){
            $description = $_POST['description'];
            $consultaion = $_POST['consultation'];
            $type = $_POST['type'];
            $cathegory=$_POST['cathegory'];
            $user=$_SESSION['email'];
            $Result=$this->model->cathegory($cathegory);
            $id_cathegory=$Result[0];
            $this->model->new_consult($description,$consultaion,$user,$id_cathegory,"not answered",$type);
            header('location:controlleur_user.php?action=consultations');
        }

        public function delete_consultation() {
            $id_consultation = $_GET['id_question'];
            $this->model->delete_consultation($id_consultation);
            header('location:controlleur_user.php?action=consultations');
        }

        public function update_consultation() {
            $id_question=$_GET['id_consultation'];
            $description=$_POST['description'];
            $consultation=$_POST['consultation'];
            $type = $_POST['type'];
            $cathegory=$_POST['cathegory'];
            $user=$_SESSION['email'];
            $Result=$this->model->cathegory($cathegory);
            $id_cathegory=$Result[0];
            $this->model->update_consultation($description,$consultation,$user,$id_cathegory,"not answered",$type,$id_question);
            header('location:controlleur_user.php?action=consultations');
            
        }
     

        public function action() {
            $action="all";
            if(isset($_GET['action'])){
                $action=$_GET['action'];
            }
            if(isset($_POST['action'])){
                $action=$_POST['action'];
            }
            switch($action) {
                case 'signin':
                    $this->authentification();
                    break;
                case 'registration':
                    $this->first_register();
                    break;
                case 'modify_profil':
                    $this->modify_profil();
                    break;
                case 'maladies':
                   $this->maladies();
                   break;
                case 'add_maladie':
                    $this->add_maladie();
                    break;
                case 'delete_maladie':
                    $this->delete_maladie();
                    break;
                case 'consultations':
                    $this->consultations();
                    break;
                case 'see':
                    $this->see();
                    break;
                case 'new_consult':
                    $this->new_consult();
                    break;
                case 'delete_consultation':
                    $this->delete_consultation();
                    break;
                case 'update_consult':
                    $this->update_consultation();
                    break;

              
            }
        }
    }
    $c =new controlleur_user();
    $c->action();
?>