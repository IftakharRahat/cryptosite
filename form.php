<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Crypto</title>
    <link rel="stylesheet" href="buy.css">
</head>
<body>
    <div class="buy-container" id="buyForm">
        <h1 id="crypto-name"></h1>
        

        <form  action="buy.php" method="POST">
            <label for="user-id">User ID:</label>
            <input type="text" id="user-id" name="user-id" required>

            <label for="balance">Quantity:</label>
            <input type="number" id="balance" name="balance" min="1" required>

            <input type="hidden" id="crypto" name="crypto">
            <button type="submit" name="buyForm">Buy Now</button>
        </form>
    </div>
    
    <script>
        
        const urlParams = new URLSearchParams(window.location.search);
        const cryptoName = urlParams.get('crypto');
        document.getElementById('crypto-name').textContent = `Buy ${cryptoName}`;
        document.getElementById('crypto').value = cryptoName;
    </script>
</body>
</html>
