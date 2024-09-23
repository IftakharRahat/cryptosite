<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  
</head>
</head>
<body>
  <div class="container" id="signup" style="display:none">
    <h1 class="form-title">Register</h1>
    <form action="register.php" method="POST">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-globe"></i>
            <input type="text" name="country" id="country" placeholder="Country" required>
            <label for="country">Country</label>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-cake-candles"></i>
            <input type="text" name="birth" id="birth" placeholder="Date of Birth" required>
            <label for="birth">Date of Birth</label>
        </div>
        <div class="input-group">
            <i class="fa-regular fa-id-card"></i>
            <input type="text" name="userId" id="userId" placeholder="User Id" required>
            <label for="userId">User Id</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-phone"></i>
            <input type="text" name="number" id="number" placeholder="Number" required>
            <label for="number">Number</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <div class="input-group">
            <i class="fa-solid fa-money-bill"></i>
            <input type="text" name="balance" id="balance" placeholder="Balance" required>
            <label for="balance">Balance</label>
        </div>
        <input type="submit" class="btn" value="Sign Up" name="signUp">
    </form>
    <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
    </div>
  </div>
  <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form action="register.php" method="POST">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="text" name="userId" id="email" placeholder="userId" required>
              <label for="userId">User ID</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
          <input type="submit" class="btn" value="Sign In" name="signIn">




        </form>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
  </div>
  <script src="script.js"></script>
  
        

   
  
</body>
</html>








<?php 
  // include("database.php");
  // $user="RahatKinh";
  // $password= "abcd";
  // $hash= password_hash($password, PASSWORD_DEFAULT);
  // $sql= "INSERT INTO USERS (user,password)
  //        VALUES ('$user','$hash')";

  // try {
  //   mysqli_query($conn, $sql);
  //   echo "User is now registered";

  // }
  // catch(mysqli_sql_exception) {
  //   echo"Could not register user";
  // }
  
  // mysqli_close($conn);
  // $sql="SELECT * FROM users";
  // $result=mysqli_query($conn,$sql);
  // if (mysqli_num_rows($result) > 0) {
  //   while ($row=mysqli_fetch_assoc($result)){
  //     echo $row["id"]. "<br>" ;
  //     echo $row["user"]. "<br>" ;
  //     echo $row["regdat"]. "<br>" ;
  //   }
  // }
  // else {
  //   echo "No user found" ;
  // }






  // $credit=null;
  // if (isset($_POST["credit_card"])){
  //   $credit=$_POST["credit_card"];
  // }
  // switch($credit){
  //   case "Visa":
  //     echo "You selected visa";
  //     break;
  //   case "Mastercard":
  //     echo "You selected Mastercard";
  //     break;
  //   case "Express":
  //     echo "You selected Express";
  //     break;
  //   default :
  //     echo"please make a selection";
  //     break;
  // }


  
  // foreach($_POST as $key => $value){
  //   echo"{$key} = {$value} <br>";
  // }
  // if (isset($_POST["login"])) {
  //   $username=$_POST["username"];
  //   $password=$_POST["password"];
    
  //   if (empty($username)){
  //     echo"Username is missing";
  //   }
  //   elseif (empty($password)){
  //     echo"Password is missing";
  //   }
  //   else{
  //     echo"Welcome {$username}";
  //   }


  // }

  // $counter=$_POST["counter"];
  
  // for($i = 0; $i <= $counter; $i++){ 
  //   echo $i. "<br>";
  // }
  // $foods=array('a','b','c','d');
  // array_pop($foods);
  // array_push($foods, "e");
  // array_shift($foods);
  // foreach($foods as $f){
  //   echo $f;
  // }
  #associative array:
  // $capitals=array("Bangladesh"=>"Dhaka",
  //                  "India"=>"Delhi",
  //                  "Srilanka"=>"colombo",
  //                  "Pakistan"=>"karachi");
 

  // $capital=$capitals[$_POST["country"]];
  // echo "{$capital}";
// $captials["Nepal"]="Kathmandu";
// array_pop($captials);
// $keys=array_keys($captials);
// foreach($keys as $key ){
//   echo"{$key}. <br>";

// }
// $values=array_values($captials);
// foreach($values as $value ){
//   echo"{$value}. <br>";

// }
// $capitals=array_flip($captials);

//   foreach($captials as $key => $value){
//     echo"{$key} : {$value}. <br>";

//   }

  // $radius=$_POST["radius"];
  // $circumference=null;
  // $circumference=2* pi() * $radius;
  // echo"Circumference is {$circumference} cm";
  // $grade="F";
  // switch($grade){
  //   case "A":
  //     echo "You did bad";
  //     break;
      
  //   case "C":
  //     echo "cat";
  //     break;
  //   case "B":
  //      echo "huuu";
  //      break;

  // }


?>