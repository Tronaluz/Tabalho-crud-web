<?php 
class Auth {
    private PDO $db;
    public function __construct($db){
        session_start();
        $this->db = $db;
    }

    public function getAuthenticate() {
        $user =$_SESSION["user"];
        if (isset($user)) {
            return true;
        }
        return false;
    }

    public function makeAuthenticate() {
        $user = $_POST["user"];
        $stmt = $this->db->prepare("SELECT * FROM WHERE EMAIL = ? AND PASSWORD ?");
        $stmt->bindParam(1, $user["email"]);
        $stmt->bindParam(2, hash("md5", $user["password"]));
        $stmt->execute();
        $userExists = $stmt->rowCount() >= 1;
        if ($userExists) {
            $_SESSION["user"] = $user;
            return true;
        }
        return false; 
    }
}
?>