<?php
namespace core;
//possible issue
//Here both file can not include database
include "mainFunctions.php";
include "authentication.php";

$mainfunction = new MainFunction;
$authentication = new Authentication;

if (isset($_POST['create_account']))
{
     $table_field = ['name','age','phoneNumber',
    'initialDeposit','accountName','password'];
    $location ="/learning4/createaccount";
    $mainfunction ->createBankAccount($table_field,$_POST,'bank_account','account_created', $location);
    

}
if (isset($_POST['login'])){
    $login = $authentication -> login($_POST);
    
    
}

if(isset($_POST['deposit'])){
    if(!isset($_SESSION)){
        session_start();
    }
    $amount = $_POST['deposit_amount'];
    $mainfunction -> deposit($_SESSION['user_data']['accountNumber'], $amount);
    $mainfunction -> refresh();
    
   

}
if(isset($_POST['withdraw'])){
    if(!isset($_SESSION)){
        session_start();
    }
    $amount = $_POST['withdraw_amount'];
    $mainfunction -> debit($_SESSION['user_data']['accountNumber'], $amount);
    $mainfunction -> refresh();

}

if(isset($_POST['show-btn'])){
    
}






?>