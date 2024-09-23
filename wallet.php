<?php
include('wallet2.php'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Wallet</title>
    <link rel="stylesheet" href="wallet.css">
</head>
<body>
    <div class="wallet-container">
        <h1>Check Your Wallet Information</h1>
        <form action="wallet2.php" method="POST">
            <label for="user-id">Enter Your User ID:</label>
            <input type="text" id="user-id" name="user-id" placeholder="Enter your user ID" required>
            <button type="submit" name="submit">Check Wallet</button>
        </form>

        
    </div>
</body>
</html>
