<?php

$host = 'localhost';  
$username = 'root';   
$password = '';       
$dbname = 'crypto';   

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 1: Select top 3 users with the highest profit from the wallet table
$sql = "SELECT user_id, profit FROM wallet ORDER BY profit DESC LIMIT 3";
$result = $conn->query($sql);

// Define seminar times for the top 3 experts
$seminar_times = ['10:00 AM', '1:00 PM', '4:00 PM'];
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Expert Seminar Portal</title>
    <link rel="stylesheet" href="sahib.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to the Crypto Expert Seminar Portal</h1>
        </header>

        <main>
            <section class="seminars">
                <h2>Top 3 Experts and Their Seminar Times</h2>
                <!-- Dynamically generated content -->
                <?php
                // Step 2: Display the top 3 users with their profit and seminar time
                if ($result->num_rows > 0) {
                    echo "<table class='expert-table'>
                            <tr>
                                <th>Expert ID</th>
                                <th>Profit</th>
                                <th>Seminar Time</th>
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        $user_id = $row['user_id'];
                        $profit = $row['profit'];
                        $seminar_time = $seminar_times[$i];

                        // Check if the user is already in the expert table
                        $check_expert_sql = "SELECT * FROM expert WHERE user_id = '$user_id'";
                        $check_expert_result = $conn->query($check_expert_sql);

                        // Insert user into expert table if not already present
                        if ($check_expert_result->num_rows == 0) {
                            $insert_expert_sql = "INSERT INTO expert (User_ID, seminar, video) 
                                                  VALUES ('$user_id', '$seminar_time', 'abcd')";
                            if ($conn->query($insert_expert_sql) === TRUE) {
                                echo "<p>User ID " . $user_id . " added as an expert.</p>";
                            } else {
                                echo "Error: " . $conn->error;
                            }
                        }

                        // Display the expert data
                        echo "<tr>
                                <td>" . $user_id . "</td>
                                <td>" . $profit . "</td>
                                <td>" . $seminar_time . "</td>
                              </tr>";
                        $i++;
                    }
                    echo "</table>";
                } else {
                    echo "No users found.";
                }
                ?>
            </section>
        </main>

        <footer>
            <p>Powered by Crypto Solutions | &copy; 2024</p>
        </footer>
    </div>
</body>
</html>

<?php
$conn->close();
?>
