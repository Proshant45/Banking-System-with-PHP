<?php
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['user_data'])){
    $user_data = $_SESSION['user_data'];
}else{
    $acbjkacbjk = false;
}

?>
