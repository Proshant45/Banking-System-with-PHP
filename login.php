<?php
include "header.php";

if(isset($_SESSION['user_data'])){
    header("Location: dashboard.php");
  }


include "messages.php"
?>
<div class="container mx-auto my-10 p-5 bg-white rounded shadow max-w-md">
    <h2 class="text-3xl font-semibold mb-5 text-center">Login</h2>
    <form class="space-y-6" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
      <div>
        <label class="block text-sm font-medium">Account Number</label>
        <input type="text" class="w-full p-2 border rounded" name="accountNumber" placeholder="Enter your Account Number" required>
      </div>
      <div>
        <label class="block text-sm font-medium">Password</label>
        <input type="password" name="password" class="w-full p-2 border rounded" placeholder="Enter your password" required>
      </div>
      <button type="submit" name="login" class="w-full px-4 py-2 bg-blue-500 text-white rounded">Login</button>
    </form>
    <p class="text-center text-gray-600 mt-4">Don't have an account? <a href="createaccount.php" class="text-blue-500 hover:underline">Create one</a></p>
  </div>


<?php
include "footer.php";
?>