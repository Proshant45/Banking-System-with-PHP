<?php
namespace core;

use mysqli;

include "database.php";


class MainFunction{
        public function dbconn(){
            return Database::connect();
        }
        public function prepare_data($data_fields,$data_for,$values=null){
            $new_fields = [];
            foreach($data_fields as $data_field){
                if ($data_for =='table_field')
                $new_field = "`".$data_field . "`";
                else{
                $new_field = "'".$values[$data_field]."'";
                }
                array_push($new_fields,$new_field);
            }
            $data_forDatabase = implode(',',$new_fields);

            return $data_forDatabase;
           
        }
   

        public function createBankAccount($data_field,$values,$table_name,$message, $location){
            $accountNumber = 'AKB'. rand(100000,999999);
            $data_for_database_field = " `accountNumber`,".$this -> prepare_data($data_field,'table_field');
            
            $data_for_database_value = " '$accountNumber',".$this -> prepare_data($data_field,'table_value',$values);

            $name = $values['name'];
            $age = $values['age'];
            $phoneNumber=$values['phoneNumber'];
            $initialDeposit = $values['initialDeposit'];
            $result=mysqli_query($this->dbconn(),"SELECT * FROM $table_name WHERE name ='$name' AND phoneNumber = '$phoneNumber'");
            $numberofrows = mysqli_num_rows($result);
            //one user with maximum three account
            
            if($age<18){
                //Must be 18 years old
                header('Location: '.$location.'.php?underaged=true');
            }
            elseif($numberofrows > 3){
                // " Already have 3 account"
                header('Location: '.$location.'.php?multiple_account=true');
            }
            elseif($initialDeposit < 500){
                //"Minimum Deposit 500"
                header('Location: '.$location.'.php?insufficent_initial_deposit=true');
            }
            else{

                $add_querry = "INSERT INTO `$table_name`($data_for_database_field) VALUES($data_for_database_value) ";
                $add_result = mysqli_query($this->dbconn(),$add_querry);
                $this->deposit($accountNumber,$initialDeposit);
                
                if($add_result){
                    header('Location: '.$location.'.php?account_created='.$accountNumber);
                   
                }

            }
                    

        }

        public function deposit($accountNumber,$amount){
           
            $balance_res = mysqli_query($this->dbconn(),"SELECT * FROM bank_account WHERE accountNumber='$accountNumber' ");
            $target_row=mysqli_fetch_assoc($balance_res);
            $balance = $target_row['balance'];
            $credit = $target_row['credit'];
                if($amount > 0){
                    $balance += $amount;
                    $credit += $amount;
                    $add_balance = mysqli_query($this->dbconn(),"UPDATE bank_account SET `balance` = '$balance',`credit` = '$credit' WHERE accountNumber='$accountNumber'");
                    $this-> transation($accountNumber,$amount,$balance,$credit=$amount,0);
                }
                else{
                    //messages
                }
        }
        public function debit($accountNumber,$amount){
           
            $balance_res = mysqli_query($this->dbconn(),"SELECT * FROM bank_account WHERE accountNumber='$accountNumber' ");
            $target_row=mysqli_fetch_assoc($balance_res);
            $balance = $target_row['balance'];
            $debit = $target_row['debit'];
                if($balance >= $amount ){
                    $balance -= $amount;
                    $debit += $amount;
                    $deduct_balance = mysqli_query($this->dbconn(),"UPDATE bank_account SET `balance` = '$balance',`debit` = '$debit' WHERE accountNumber='$accountNumber'");
                    $this-> transation($accountNumber,$amount,$balance,0,$debit=$amount);
                }
                else{
                    //messages
                }
        }
        public function transation($accountNumber,$amount,$balance,$credit=0,$debit=0){
            //Generating Transaction Number
            $currentDateTime = date('Y-m-d H:i:s');
            $transactionNumber = $this->generateRandomString();
    
            $sql = "INSERT INTO `transaction` (`accountNumber`, `transactionNumber`, `date`, `amount`, `debit`, `credit`, `balance`) VALUES ('$accountNumber', '$transactionNumber', '$currentDateTime', '$amount', '$debit', '$credit', '$balance')";
            mysqli_query($this->dbconn(),$sql);

        }

        public function generateRandomString($length = 8) {
            // Define the characters to be used in the random string
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
        
            // Loop to generate random string of specified length
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }       
            // Prefix "BKB" to the generated random string
            return 'BKB' . $randomString;
        }

        public function refresh(){
            $accountNumber = $_SESSION['user_data']['accountNumber'];
            $result = mysqli_query($this->dbconn(),"SELECT * FROM `bank_account` Where `accountNumber`='$accountNumber'");
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_data']=$row;




        }
        
  

       

}
?>


