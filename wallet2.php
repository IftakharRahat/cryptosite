<?php
include('connect.php'); // Include the database connection

if (isset($_POST['submit'])) {
    $user_id = $_POST['user-id'];

    // Query to fetch the wallet data for the specific user
    $wallet_query = $conn->query("SELECT Balance, Investment, Profit FROM wallet WHERE User_ID='$user_id'");

    // Check if the user exists in the wallet table
    if ($wallet_query->num_rows > 0) {
        // Fetch wallet data
        $wallet = $wallet_query->fetch_assoc();
        $balance = $wallet['Balance'];
        $investment = $wallet['Investment'];
        $profit = $wallet['Profit'];

        // Calculate Profit/Loss based on profit value
        $profit_loss_message = ($profit >= 0) 
            ? "<p class='profit positive'>Profit: BDT $profit</p>"
            : "<p class='profit negative'>Loss: BDT " . abs($profit) . "</p>";

    } else {
        // No matching User ID
        $error_message = "User ID not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="wallet.css">
</head>
<body>
            <?php if (isset($balance)): ?>
            <div class="wallet-info">
                <h2>Wallet Details for User: <?= htmlspecialchars($user_id) ?></h2>
                <div class="wallet-card">
                    <p>Balance: BDT <?= $balance ?></p>
                    <p>Total Investment: BDT <?= $investment ?></p>
                    <?= $profit_loss_message ?>
                </div>
            </div>
            <?php elseif (isset($error_message)): ?>
            <p class="error"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
</body>
</html>
