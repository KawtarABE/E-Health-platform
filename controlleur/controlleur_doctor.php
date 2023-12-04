<?php 
    include 'C:\xampp\htdocs\pfa\model\model_doctor.php';
    class controlleur_doctor{
        private $model;
        private $action;
        
        public function __construct() { 
            $this->model = new model_doctor() ;
            $this->action='all';
        }

        public function authentification() {
            if(!empty($_POST['doctor'])&&!empty($_POST['password'])) {
                $doctor = $_POST['doctor'];
                $password = $_POST['password'];
                $row = $this->model->login_doctor(array($doctor));
                if ($password==$row['password']){
                    $_SESSION['authent']=true;
                    $_SESSION['id']=$row['id_doctor'];
                    $_SESSION['email']=$doctor;
                    $_SESSION['first_name']=$row['first_name'];
                    $_SESSION['last_name']=$row['last_name'];
                    $_SESSION['sexe']=$row['sexe'];
                    $_SESSION['cathegory']=$row['name_of_cathegory'];
                    $_SESSION['id_cathegory']=$row['id_cathegory'];
                    $_SESSION['password']=$password;
                    header('location:controlleur_doctor.php?action=consultation');
                }
            else {
                    header('location:..\view\view_doctor\login_doctor.html');
                }
            }
            else {
                header('location:..\view\view_doctor\login_doctor.php');
            }
        }

        public function consultation(){
            include 'C:\xampp\htdocs\pfa\view\view_doctor\doctor.php';
            $id_cathegory=$_SESSION['id_cathegory'];
            $consultations = $this->model->consultation($id_cathegory);
            $this->view =new view_doctor("consultation");
            $this->view->my_consultations($consultations);
            $this->view->afficher();

        }

        public function update(){
            include 'C:\xampp\htdocs\pfa\view\view_doctor\doctor.php';
            $user=$_SESSION['id'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $email=$_POST['email'];
            $cathegory=$_POST['cathegory'];
            $password=$_POST['password'];
            $id_cathegory=$this->model->cathegory($cathegory);
            echo $id_cathegory[0];
            if($id_cathegory!=NULL){
                $sexe=$_POST['sexe'];
                $result=$this->model->update_profil($email,$password,$first_name,$last_name,$id_cathegory[0],$sexe,$user);
                echo $result;
                if($result){
                    $_SESSION['auth']=true;
                    $_SESSION['email']=$email;
                    $_SESSION['first_name']=$first_name;
                    $_SESSION['last_name']=$last_name;
                    $_SESSION['sexe']=$sexe;
                    $_SESSION['cathegory']=$cathegory;
                    $_SESSION['password']=$password;
                    echo "<script>alert('Modification successfuly done. Go back to your profil');window.location='../view/view_doctor/profil_doctor.php'</script>"; 
                }
            }
            else{
                 echo "<script>alert('Cathegory not found');window.location='../view/view_doctor/profil_doctor.php'</script>";
            }
        }

        public function see(){
            include 'C:\xampp\htdocs\pfa\view\view_doctor\view_see.php';
            $id_question = $_GET['id_question'];
            $consultation = $this->model->see_more($id_question);
            $consultations = $this->model->see($id_question);
            $id = $consultation['id_categorie'];
            $cathegory = $this->model->name_cathegory($id);
            $this->view= new view_doctor_see("See more");
            $this->view->see($consultation,$cathegory[0]);
            if($consultations!=NULL){
                $this->view->see_more($consultations,$cathegory[0]);
            }
            else{
                $this->view->no_answers();
            }
            $this->view->afficher();

        }

        public function answer() {
            $id_question=$_GET['id_question'];
            $id_docteur=$_SESSION['id'];
            $answer=$_POST['answer'];
            $result = $this->model->answer($id_question,$id_docteur,$answer);
            if($result) {
                $this->model->mark_answered($id_question,"answered");
            }
            header('location:controlleur_doctor.php?action=consultation');
        }

        public function history(){
            include 'C:\xampp\htdocs\pfa\view\view_doctor\view_history.php';
            $id=$_SESSION['id'];
            $consultations = $this->model->history($id);
            $this->view =new view_history("consultation");
            $this->view->history($consultations);
            $this->view->afficher();
        }

        public function see_profil(){
            include 'C:\xampp\htdocs\pfa\view\view_doctor\view_profil.php';
            $patient = $_GET['patient'];
            $result=$this->model->get_patient_id($patient);
            $id_patient=$result[0];
            $profil = $this->model->patient_profil($id_patient);
            $maladies = $this->model->patient_maladies($id_patient);
            $this->view= new view_see_profil("patient profil");
            $this->view->see_profil($profil,$maladies);
            $this->view->afficher();
        }

        public function modify() {
            $id_question=$_GET['id_question'];
            $id_doctor=$_GET['id_doctor'];
            $answer=$_POST['answer'];
            $result = $this->model->modify($answer,$id_question,$id_doctor);
            if($result){
                header('location:controlleur_doctor.php?action=history');
            }
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
                case 'modify_profil':
                    $this->update();
                    break;
                case 'consultation':
                    $this->consultation();
                    break;
                case 'see':
                    $this->see();
                    break;
                case 'answer':
                    $this->answer();
                    break;
                case 'history':
                    $this->history();
                    break;
                case 'see_profil':
                    $this->see_profil();
                    break;
                case 'modify':
                    $this->modify();
                    break;
            }
        }
    }
    $c = new controlleur_doctor();
    $c->action();
?>