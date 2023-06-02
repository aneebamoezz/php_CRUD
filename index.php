<?php
if(isset($_POST['name'])){
    // Set connection variables
    $host = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($host, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    $sql = "INSERT INTO `info`.`forinfo` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$msg', current_timestamp());";
    echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>My First Php Form</h1>
        <p>Enter your details and submit this form to confirm your participant in the trip</p>
        <p class="success">Thanks for submit!</p>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name"> 
            <input type="text" name="age" id="age" placeholder="Enter your age"> 
            <input type="text" name="gender" id="gender" placeholder="Enter your gender"> 
            <input type="text" name="email" id="email" placeholder="Enter your email"> 
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone no.">
            <textarea name="msg" id="msg" cols="10" rows="4" placeholder="Message"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
