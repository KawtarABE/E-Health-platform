<?php 
class model_admin{
    private $db;

    public function __construct() {
        session_start();
        $this->db = new PDO('mysql:host=localhost;dbname=pfa','root','');
    }

    public function login_admin($admin){
        $query = $this->db->prepare("select * from admins where email=?");
        $query->execute($admin);
        return $query->fetch();      
    }

    public function update_profil($password,$first_name,$last_name,$email) {
        $data = [
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ];
        $sql = "UPDATE admins SET password=:password , first_name=:first_name, last_name=:last_name WHERE email=:email";
        $stmt= $this->db->prepare($sql);
        $stmt->execute($data);
        return $email;
    }

    public function maladies(){
        $query = $this->db->prepare("select * from maladies");
        $query->execute();
        return $query->fetchAll();  
    }

    public function delete_maladie($id_maladie){
        $query = $this->db->prepare("delete from maladies where id_maladie=?");
        $query->execute(array($id_maladie));
    }

    public function add_maladie($maladie){
        $query = $this->db->prepare("insert into maladies(name_of_maladie) values(?)");
        $query->execute(array($maladie));
    }

    public function cathegories(){
        $query = $this->db->prepare("select * from cathegories");
        $query->execute();
        return $query->fetchAll();  
    }

    public function delete_cathegorie($id_cathegorie){
        $query = $this->db->prepare("delete from cathegories where id_cathegory=?");
        $query->execute(array($id_cathegorie));
    }

    public function add_cathegorie($cathegorie){
        $query = $this->db->prepare("insert into cathegories(name_of_cathegory) values(?)");
        $query->execute(array($cathegorie));
    }

    public function consultations(){
        $query = $this->db->prepare("select * from forum");
        $query->execute();
        return $query->fetchAll();  
    }

    public function delete_consultation($id_consultation){
        $query = $this->db->prepare("delete from forum where id=?");
        $query->execute(array($id_consultation));
    }

    public function users(){
        $query = $this->db->prepare("select * from patients");
        $query->execute();
        return $query->fetchAll();  
    }

    public function delete_user($id_user){
        $query = $this->db->prepare("delete from patients where id=?");
        $query->execute(array($id_user));
    }

    public function doctors(){
        $query = $this->db->prepare("select * from doctors D,cathegories C where D.id_cathegory=C.id_cathegory");
        $query->execute();
        return $query->fetchAll();  
    }

    public function id_cathegory($cathegory) {
        $query = $this->db->prepare("Select id_cathegory from cathegories where name_of_cathegory=?");
        $query->execute(array($cathegory));
        return $query->fetch() ;
    }

    public function test_doctor($doctor){
        $query= $this->db->prepare("select * from doctors where email=?");  
        $query->execute(array($doctor));
        return $query->fetchAll();
    } 

    public function add_doctor($doctor,$password,$first_name,$last_name,$sexe,$id_cathegorie){
        $query = $this->db->prepare("insert into doctors(email,password,first_name,last_name,sexe,id_cathegory) values(?,?,?,?,?,?)");
        $query->execute(array($doctor,$password,$first_name,$last_name,$sexe,$id_cathegorie));
    }

    public function delete_doctor($id_doctor){
        $query = $this->db->prepare("delete from doctors where id_doctor=?");
        $query->execute(array($id_doctor));
    }

}
?>