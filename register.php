<?php
include('connect.php');

if(isset($_POST['signUp'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $birth=$_POST['birth'];
    $userid=$_POST['userId'];
    $number=$_POST['number'];
    $balance=$_POST['balance'];
    $hash= password_hash($password,PASSWORD_DEFAULT);
    $checkId="SELECT * From user where User_ID='$userid'";
    $checkNumber="SELECT * From user phone where 'phone'='$number'";
    $result=$conn->query($checkId);
    $result2=$conn->query($checkNumber);
    if($result->num_rows>0){
        echo "User ID Already Exists !";
    }
    elseif($result2->num_rows>0){
        echo "Number Already Exists !";
    }
    else {
        $insert="INSERT INTO user(F_Name,L_Name,Country,Date_of_Birth,Password,User_ID,Balance)
                VALUES ('$firstName','$lastName','$country','$birth','$hash','$userid',$balance)";
        $insert2 = "INSERT INTO `user phone`(`User_ID`, `phone`)
            VALUES ('$userid', '$number')";
        

        if($conn->query($insert)==TRUE and $conn->query($insert2)==TRUE){
            header("location: ind.php");
            

        }
        else{
            echo "Error:".$conn->error;
        }
    }


}
if (isset($_POST['signIn'])) {
    $user = $_POST['userId'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM user WHERE User_ID = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        $stored_hashed_password = $row['Password']; 
        $password = stripslashes($password);
    

        if (password_verify($password, $stored_hashed_password)) {
            // Password matches, login successful
            echo "Login successful!";
            header('location: home.php');
        } else {
            // Password does not match
            echo "Invalid password.";
        }
    } else {
        
        echo "Not Found, Incorrect User ID or Password.";
    }

        
        
   
 }


?>
