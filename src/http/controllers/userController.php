<?php 
class UserController  {
    private PDO $db;
    public function __construct($db){
       $this->db = $db; 
    }
    public function store() {
        $user = $_POST["user"];
        $stmt = $this->db->prepare("INSERT INTO user(NAME, EMAIL, PASSWORD) VALUES(?, ?, ?)");
        $stmt->bindParam(1, $user["name"]);
        $stmt->bindParam(2, $user["email"]);
        $stmt->bindParam(3, hash("md5", $user["password"]));
        $stmt->execute();
    }

    public function update() {
        $user = $_POST["user"];
        $stmt = $this->db->prepare("UPDATE user SET NAME = ?, EMAIL = ? WHERE UUID = ?)");
        $stmt->bindParam(1, $user["name"]);
        $stmt->bindParam(2, $user["email"]);
        $stmt->bindParam(3, $user["uuid"]);
        $stmt->execute();
    }

    public function index() {
        $stmt = $this->db->prepare("SELECT * FROM user");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        return $json;
    }


    public function show() {
        $id = $_POST["uuid"];
        $stmt = $this->db->prepare("SELECT * FROM user WHERE NAME = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        return $json;
    }

    public function delete() {
        $id = $_POST["uuid"];
        $stmt = $this->db->prepare("DELETE USER WHERE UUID = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        return $json;
    }
}
