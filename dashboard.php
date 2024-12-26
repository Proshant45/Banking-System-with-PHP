<?php


$title = "Dashboard";
include "header.php";

if(!isset($_SESSION['user_data'])){
  header("Location: login.php");

}

?>

  <!-- Dashboard Content -->
  <div class="container mx-auto my-10 p-5 bg-white rounded shadow">

    <!-- User Details -->
    <div class="mb-5 text-left">
      <?php
      ?>
      <p class="text-lg font-medium">Welcome, <span id="userName"><?php echo $user_data['name']?></span></p>
      <p class="text-sm text-gray-600">Account Balance: <span id="accountNumber"><?php echo $user_data['balance']?> Taka</span></p>
    </div>
    <div class="mb-5 text-right">
      <?php
      ?>
      <p class="text-lg font-medium">Welcome, <span id="userName"><?php echo $user_data['name']?></span></p>
      <p class="text-sm text-gray-600">Account Number: <span id="accountNumber"><?php echo $user_data['accountNumber']?></span></p>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

    
      <!-- Update Bank Account -->
      <section>
        <h2 class="text-xl font-semibold mb-5">Update Bank Account</h2>
        <form class="space-y-4" action="<?php __DIR__ .'./core/frontendFunctions.php'?>" method="post">
          <!-- Form Fields -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium">Name</label>
              <input type="text" class="w-full p-2 border rounded" placeholder="Update your name">
            </div>
            <div>
              <label class="block text-sm font-medium">Age</label>
              <input type="number" class="w-full p-2 border rounded" placeholder="Update your age">
            </div>
            <div>
              <label class="block text-sm font-medium">Mobile Number</label>
              <input type="tel" class="w-full p-2 border rounded" placeholder="Update your mobile number">
            </div>
            <div>
              <label class="block text-sm font-medium">Account Name</label>
              <input type="text" class="w-full p-2 border rounded" placeholder="Update account name">
            </div>
          </div>
          <button type="submit" class="w-full md:w-auto px-4 py-2 bg-green-500 text-white rounded">Update Account</button>
        </form>
      </section>

      <!-- Deposit -->
      <section>
        <h2 class="text-xl font-semibold mb-5">Deposit</h2>
        <form class="space-y-4" method="post" action="<?php __DIR__ .'./core/frontendFunctions.php'?>">
          <div>
            <label class="block text-sm font-medium">Amount</label>
            <input type="number" name='deposit_amount' class="w-full p-2 border rounded" placeholder="Enter amount to deposit">
          </div>
          <button type="submit" name='deposit' class="w-full md:w-auto px-4 py-2 bg-indigo-500 text-white rounded">Deposit</button>
        </form>
      </section>

      <!-- Withdraw -->
      <section>
        <h2 class="text-xl font-semibold mb-5">Withdraw</h2>
        <form class="space-y-4" method="post" action="<?php __DIR__ .'./core/frontendFunctions.php'?>">
          <div>
            <label class="block text-sm font-medium">Amount</label>
            <input type="number" name='withdraw_amount' class="w-full p-2 border rounded" placeholder="Enter amount to withdraw">
          </div>
          <button type="submit" name ="withdraw" class="w-full md:w-auto px-4 py-2 bg-red-500 text-white rounded">Withdraw</button>
        </form>
      </section>

      <section>
        <h2 class="text-xl font-semibold mb-5">Transaction History</h2>
        <form class="space-y-4" method="get" action="<?php __DIR__ .'./core/frontendFunctions.php'?>" >
          <!-- <button type="submit" name="show-btn" class="w-full md:w-auto px-4 py-2 bg-yellow-500 text-white rounded">Show</button> -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <table class="min-w-full bg-white">
            <thead>
              <tr>
                <th class="py-2 px-4 border-b">Transaction ID</th>
                <th class="py-2 px-4 border-b">Date</th>
                <th class="py-2 px-4 border-b">Amount</th>
                <th class="py-2 px-4 border-b">Credit</th>
                <th class="py-2 px-4 border-b">Debit</th>
              </tr>
            </thead>
            <tbody id="transactionTableBody">
            <?php
                  $accountNumber = $user_data['accountNumber'];
                  $sql2 = "SELECT * FROM `transaction` where accountNumber = '$accountNumber' ";
                  $result = mysqli_query($mainfunction->dbconn(), $sql2);
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                <tr>
                <td class="py-2 px-4 border-b"><?php echo $row['transactionNumber']?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['date']?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['amount']?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['credit']?></td>
                <td class="py-2 px-4 border-b"><?php echo $row['debit']?></td>

                <td class="py-2 px-4 border-b">
                  <button class="px-4 py-2 bg-blue-500 text-white rounded">Show More</button>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
        
        </form>
      </section>

    </div>

  </div>

<?php


include "footer.php";

?>

