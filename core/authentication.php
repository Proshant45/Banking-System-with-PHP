<?php
namespace core;
// include "database.php";

class Authentication{
    private $conn;
    
    public function __construct()
    {
        $this -> conn = Database::connect();
       
        
    }
    public function login($data){
        $accountNumber = $data['accountNumber'];
        $password = $data['password'];
        $result = mysqli_query($this -> conn,"SELECT * FROM `bank_account` Where `accountNumber`='$accountNumber'");

        if (mysqli_num_rows($result) > 0){
            if(!isset($_SESSION)){
                session_start();
            }
            $row = mysqli_fetch_assoc($result);
            if($password === $row['password']){
                $_SESSION['user_data'] = $row;
                header('Location: dashboard.php');

            }else{
                header('Location: login.php?wrong_pass');
            }
        }
        else{
            header('Location: login.php?wrong_accountnumber');
        }
    
 
    }

 
}
?>