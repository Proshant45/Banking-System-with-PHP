<?php include __DIR__.'../core/frontendFunctions.php';
include "boootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> <?php $title?> </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<header class="bg-blue-600 py-4 shadow">
  <div class="container mx-auto px-5 flex justify-between items-center text-white">
    <h1 class="text-3xl font-bold">Banking System</h1>
    <!-- Navbar -->
    <nav>
      <ul class="flex space-x-4">
        <li><a href="createaccount.php" class="hover:underline">Create Account</a></li>
        
        <?php if(isset($_SESSION['user_data'])){ ?>

          <li><a href="logout.php" class="hover:underline">Logout</a></li>

        <?php }else{ ?> 
          <li><a href="login.php" class="hover:underline">Login</a></li>
        <?php } ?>
        
      </ul>
    </nav>
  </div>
</header>
  