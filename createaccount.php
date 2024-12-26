<?php
include 'header.php';
$title = "Create Account";
include "messages.php";
?>
  <!-- Create Bank Account -->
  <section>
        <h2 class="text-xl font-semibold mb-5 text-center">Create Bank Account</h2>
        <form class="space-y-4" method="post" action = "<?php $_SERVER['PHP_SELF'] ?>">
          <!-- Form Fields -->
          <div class="grid grid-cols-2 md:grid-cols-2 gap-5 m-10">
            <div>
              <label class="block text-sm font-medium">Name</label>
              <input type="text" name="name" class="w-full p-2 border rounded" placeholder="Enter your name">
            </div>
            <div>
              <label class="block text-sm font-medium">Age</label>
              <input type="number" name="age" class="w-full p-2 border rounded" placeholder="Enter your age">
            </div>
            <div>
              <label class="block text-sm font-medium">Mobile Number</label>
              <input type="tel" name ="phoneNumber" class="w-full p-2 border rounded" placeholder="Enter your mobile number">
            </div>
            <div>
              <label class="block text-sm font-medium">Initial Deposit</label>
              <input type="text" name ="initialDeposit"class="w-full p-2 border rounded" placeholder="Enter initial deposit">
            </div>
            <div>
              <label class="block text-sm font-medium">Account Name</label>
              <input type="text" name="accountName" class="w-full p-2 border rounded" placeholder="Enter account name">
            </div>
            <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded" placeholder="Set A Password For Your Account">
            </div>
          </div>
          <div class ="text-center">
            <button type="submit" name="create_account" class="w-full inline md:w-auto px-4 py-2 bg-blue-500 text-white rounded ml-10 mb-10">Create Account</button>
          </div>
        </form>
      </section>
<?php

include "footer.php";
?>