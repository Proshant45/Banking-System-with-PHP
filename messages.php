<?php 
if(isset($_GET['account_created'])){
    ?> <div class=""> <h3>Congretulations! Your account has been created successfully.Please Note DownYour Account Number <?php echo$_GET['account_created'] ?> </h3></div>
    <?php
}?>
<?php
if(isset($_GET['underaged'])){
    echo" 18 bochorer aage bank account khola jay nah baba!";
}
elseif(isset($_GET['insufficent_initial_deposit'])){
    echo"Minimum balance Must be 500";
}
elseif(isset($_GET['multiple_account'])){
    echo"Onek gulo account, Ar nah !";

}
//for login Page

if(isset($_GET['wrong_accountnumber'])){ ?> 
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Account Number is Incorrect 
    </div>  
<?php }
if(isset($_GET['wrong_pass'])){ ?>
     <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Password is Incorrect 
    </div>  
    

<?php }


?>

