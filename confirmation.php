<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation</title>
    <link rel="stylesheet" href="buy.css">
</head>
<body>
    <div class="confirmation-container">
        <h1>Congratulations!</h1>
        <p id="congratulations-message"></p>
    </div>

    <script>
        // Get user details from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const cryptoName = urlParams.get('crypto');
        const userId = urlParams.get('user-id');
        const quantity = urlParams.get('balance');

        // Show confirmation message
        const message = `User ID ${userId}, you have successfully bought ${quantity} ${cryptoName} .`;
        document.getElementById('congratulations-message').textContent = message;
    </script>
</body>
</html>
<?php
