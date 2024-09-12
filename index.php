<?php
$insert =false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database= "shogran trip";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $other = $_POST['other'];

    // Corrected SQL query
    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$phone', '$email', '$other', current_timestamp());";
    // echo $sql;

    if ($con->query($sql) === true) {
        // echo "Successfully inserted";
        $insert=true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Travel form</title>
</head>
<body>
    <img class="bg" src="Shogran,Naran_Valley.jpg" alt="bg">
    <div class="container">
        <h1>Welcome to Phoenix Travels</h1>
        <p>Enter details and submit this form to confirm Your Reservation in trip to Shogran!</p>
        <?php
        if($insert == true){
        echo"<p class='msgsub'>Thanks for submitting your form. We are happy to see you joining in the trip to Shogran!</p>";
         } ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="text" name="phone" id="phone" placeholder="Enter Your Phone no">
            <input type="text" name="email" id="email" placeholder="Enter Your Email">
            <textarea name="other" id="other" cols="30" rows="10">Enter any other Information</textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>
