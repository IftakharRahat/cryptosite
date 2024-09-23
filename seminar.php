<?php
// Database connection
$host = 'localhost';  
$username = 'root';   
$password = '';       
$dbname = 'crypto';   

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 1: Fetch seminar information (both experts and general users can view)
$sql = "SELECT s.title, s.time,s.session_link, e.user_id 
        FROM seminar s
        JOIN expert e ON s.user_id = e.user_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Management</title>
    <link rel="stylesheet" href="seminar.css"> <!-- Link to CSS -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Seminar Management Portal</h1>
        </header>

        <main>
            <!-- Current Seminars Section -->
            <section class="seminars">
                <h2>Current Seminars</h2>
                <?php
                if ($result->num_rows > 0) {
                    echo "<table class='seminar-table'>
                            <tr>
                                <th>Expert ID</th>
                                <th>Seminar Title</th>
                                <th>Seminar Time</th>
                                <th>Session Link</th>
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['user_id'] . "</td>
                                <td>" . ($row['title'] ? $row['title'] : 'No Title Yet') . "</td>
                                <td>" . $row['time'] . "</td>
                                <td>" . ($row['session_link'] ? "<a href='" . $row['session_link'] . "' target='_blank'>Join Session</a>" : 'No Link Yet') . "</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No seminars available at the moment.</p>";
                }
                ?>
            </section>

            <!-- Update Seminar Form for Experts -->
            <section class="update-seminar">
                <h2>Update Seminar (Experts Only)</h2>
                <form action="seminar.php" method="post">
                    <label for="user_id">Expert User ID:</label>
                    <input type="text" name="user_id" id="user_id" required><br><br>

                    <label for="title">Seminar Title:</label>
                    <input type="text" name="title" id="title" required><br><br>

                    <label for="session_link">Session Link:</label>
                    <input type="url" name="session_link" id="session_link" required><br><br>

                    <label for="time">Session Time:</label>
                    <input type="text" name="session_time" id="session_time" required><br><br>

                    <input type="submit" name="update_seminar" value="Update Seminar">
                </form>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Crypto Solutions</p>
        </footer>
    </div>
</body>
</html>

<?php
 
if (isset($_POST['update_seminar'])) {
    $user_id = $_POST['user_id'];  // Expert's user_id
    $title = $_POST['title'];      // Seminar title
    $session_link = $_POST['session_link'];
    $session_time=$_POST['session_time'];
    // Check if the expert is already listed in the seminar table
    $check_seminar_sql = "SELECT * FROM expert WHERE user_id = '$user_id'";
    $check_seminar_result = $conn->query($check_seminar_sql);

    if ($check_seminar_result->num_rows > 0) {
        // Update seminar info
        $update_sql= "INSERT INTO `seminar`(`title`, `User_ID`, `session_link`, `time`)  VALUES ('$title','$user_id','$session_link' ,'$session_time')";

        // $update_sql = "UPDATE seminar         //                SET title = '$title', session_link = '$session_link' 
        //                WHERE user_id = '$user_id'";
        if ($conn->query($update_sql) === TRUE) {
            echo "<p>Seminar information updated successfully.</p>";
        } else {
            echo "<p>Error updating seminar: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>You are not assigned as an expert for any seminar.</p>";
    }
}

$conn->close();
?>
