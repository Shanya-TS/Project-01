<?php
require_once('DbConnector.php');
require_once('./signup.php');

class Register{
    private $firstName;
    private $lastName;
    private $tp;
    private $userName;
    private $email;
    private $password;
    private $img_path;

    public function __construct ( $firstName, $lastName, $tp, $userName, $email, $password,$img_path){
        $this->firstName = $firstName;
        $this->tp = $tp;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->img_path = $img_path;
        
    }
    public function register(){
        try {
            $db = new dbConnection();
            $db->dbconnt();
            $queary = "INSERT INTO customer (fName,lName,username,password,contact,email,img_path)VALUES (?,?,?,?,?,?,?)";
            $stmt= $db->preQuery($queary);
            $stmt->bindValue(1,$this->firstName);
            $stmt->bindValue(2,$this->lastName);
            $stmt->bindValue(3,$this->userName);
            $stmt->bindValue(4,$this->password);
            $stmt->bindValue(5,$this->tp);
            $stmt->bindValue(3,$this->email);
            $stmt->bindValue(4,$this->img_path);

            $stmt->execute();
            return ($stmt->rowCount() > 0);
            
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>