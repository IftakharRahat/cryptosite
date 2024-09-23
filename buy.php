<?php



include('connect.php');


if (isset($_POST['buyForm'])) {
    
    $user_id = $_POST['user-id'];
    $crypto_name = $_POST['crypto'];
    $quantity = $_POST['balance'];
    $random_profit = rand(-10000, 10000);

   
    $user_query = $conn->query("SELECT * FROM user WHERE User_ID='$user_id'");
    $user = $user_query->fetch_assoc();

    if ($user) {
        $user_balance = $user['Balance'];  
        $crypto_query = $conn->query("SELECT * FROM `crypto` WHERE Name='$crypto_name'");
        $crypto = $crypto_query->fetch_assoc();

        if ($crypto) {
            $crypto_price = $crypto['Price'];

            
            $total_cost = $quantity * $crypto_price;

            $profitedBalance=$total_cost + $random_profit ;

            
            if ($total_cost <= $user_balance) {
                
                $new_balance = $user_balance - $total_cost;
                $conn->query("UPDATE user SET Balance='$new_balance' WHERE User_ID='$user_id'");
                $conn->query("INSERT INTO `user buy crypto`(`User_ID`, `Crypto_Name`, `Amount`) VALUES ('$user_id', '$crypto_name', '$quantity')");

                $wallet = $conn->query("SELECT`Balance`, `Investment`, `Profit` FROM wallet WHERE User_ID='$user_id'");
              
                
                if ($wallet->num_rows > 0) {
                   
                    $wal = $wallet->fetch_assoc();
                    $balance = $wal['Balance'];
                    $invest = $wal['Investment'];
                    $profit = $wal['Profit'];

                    $pBalance=$balance + $profitedBalance ;
                    $tInvest=$invest+$total_cost;
                    $tProfit=$pBalance-$tInvest;
                } else {
                    $pBalance=$profitedBalance;
                    $tInvest=$total_cost;
                    $tProfit=$pBalance-$tInvest;

                }

               
                
                
                $wallet_query = $conn->query("SELECT * FROM `wallet` WHERE User_ID='$user_id'");
                if ($wallet_query->num_rows > 0) {
                    
                    $conn->query("UPDATE `wallet` SET Balance='$pBalance', Investment='$tInvest', Profit='$tProfit' WHERE User_ID='$user_id'");
                } else {
                    
                    $conn->query("INSERT INTO `wallet`(`User_ID`, `Balance`, `Investment`, `Profit`) VALUES ('$user_id', '$pBalance', '$tInvest', '$tProfit')");

                }

                
                
               
                
                
                echo "<script>alert('Congratulations! You have successfully bought $quantity $crypto_name for $total_cost BDT.');</script>";
                echo "Purchase successful! You have bought $quantity $crypto_name for $total_cost BDT.";
                
            } else {
                
                
                echo "<script>alert('Purchase failed. You do not have enough balance.');</script>";
                echo "Purchase failed. You do not have enough balance.";
                
            }
        } else {
            
            
            echo "<script>alert('The selected cryptocurrency was not found.');</script>";
            echo "The selected cryptocurrency was not found.";
            
        }
    } else {
        
        echo "<script>alert('User not found.');</script>";
        echo "User not found.";
    }
}
?>