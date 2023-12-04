<?php 
class model_user{
    private $db;

    public function __construct() {
        session_start();
        $this->db = new PDO('mysql:host=localhost;dbname=pfa','root','');
    }

    public function login_user($user){
        $query = $this->db->prepare("select * from patients where email=?");
        $query->execute($user);
        return $query->fetch();      
    }

    public function test_user($user){
        $query= $this->db->prepare("select * from patients where email=?");  
        $query->execute(array($user));
        return $query->fetchAll();
    } 
    
    public function first_register($user,$password,$first_name,$last_name,$sexe,$date) {
        $query = $this->db->prepare("insert into patients(email,password,first_name,last_name,sexe,date_of_birth) values(?,?,?,?,?,?)");
        $query->execute([$user,$password,$first_name,$last_name,$sexe,$date]);
        return true ;
    }

    public function update_profil($email,$password,$first_name,$last_name,$birthday,$sexe,$user) {
        $data = [
            'email' => $email,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'date_of_birth' => $birthday,
            'sexe' => $sexe,
            'id' => $user,
        ];
        $sql = "UPDATE patients SET email=:email, password=:password , first_name=:first_name, last_name=:last_name, date_of_birth=:date_of_birth , sexe=:sexe WHERE id=:id";
        $stmt= $this->db->prepare($sql);
        $stmt->execute($data);
        return $email;
    }

    public function maladies() {
        $query= $this->db->prepare("select * from maladies");  
        $query->execute();
        return $query->fetchAll();
    }

    // public function statut($user,$maladie) {
    //     $query= $this->db->prepare("select count(*) from patient_maladie where id_patient=$user and id_maladie=$maladie");  
    //     $query->execute();
    //     return $query->fetchAll();

    // }

    public function test_maladie($id_patient,$id_maladie){
        $query = $this->db->prepare("select count(*) from patient_maladie where id_patient=? and id_maladie=?");
        $query->execute(array($id_patient,$id_maladie));
        return $query->fetch();
    }

    public function add_maladie($id_patient,$id_maladie) {
        $query = $this->db->prepare("insert into patient_maladie values(?,?)");
        $query->execute(array($id_patient,$id_maladie));
        return true ;

    }

    public function delete_maladie($id_patient,$id_maladie){
        $query = $this->db->prepare("delete from patient_maladie where id_patient=? and id_maladie=?");
        $query->execute(array($id_patient,$id_maladie));
    }

    public function consultations($patient){
        $query = $this->db->prepare("select * from forum where Patient = ?");
        $query->execute(array($patient));
        return $query->fetchAll();
    }

    public function see_more($id_question){
        $query = $this->db->prepare("select * from forum where id = ?");
        $query->execute(array($id_question));
        return $query->fetch();
    }

    public function see($id_question){
        $query = $this->db->prepare("select * from doctors D,forum F,answers A where A.id_doctor=D.id_doctor and F.id=A.id_consultation and A.id_consultation=?");
        $query->execute(array($id_question));
        return $query->fetchAll();
    }

    public function cathegory($cathegory) {
        $query = $this->db->prepare("select id_cathegory from `cathegories` where `name_of_cathegory`=?");
        $query->execute(array($cathegory));
        return $query->fetch();
    }

    public function name_cathegory($id_cathegory){
        $query = $this->db->prepare("select name_of_cathegory from cathegories where id_cathegory=?");
        $query->execute(array($id_cathegory));
        return $query->fetch() ;
    }

    public function new_consult($description,$consultaion,$user,$id_cathegory,$statut,$type){
        $query = $this->db->prepare("insert into forum(Description,Post,patient,id_categorie,statut,type) values(?,?,?,?,?,?)");
        $query->execute(array($description,$consultaion,$user,$id_cathegory,$statut,$type));
    }

    public function delete_consultation($id_consultation){
        $query = $this->db->prepare("delete from forum where id=?");
        $query->execute(array($id_consultation));
    }

    public function update_consultation($description,$consultation,$user,$id_cathegory,$statut,$type,$id_question){
        $data = [
            'Description' => $description,
            'consultation' => $consultation,
            'user' => $user,
            'id_cathegory' => $id_cathegory,
            'statut' => $statut,
            'type' => $type,
            'id_question' => $id_question,
        ];
        $sql = "UPDATE forum SET Description=:Description, Post=:consultation , patient=:user, id_categorie=:id_cathegory, statut=:statut , type=:type WHERE id=:id_question";
        $stmt= $this->db->prepare($sql);
        $stmt->execute($data);
    }
}
?>