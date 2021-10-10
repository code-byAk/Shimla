<?php
$insert=false;
if((isset($_POST['name'])))
{
    $server ="localhost";
    $username= "root";
    $password="";
    $conn=mysqli_connect($server,$username,$password);
    if(!$conn){
        die("Connection to this database failed due to". mysql_connect_error());
    } //Data Connection 
    // echo "Success connecting";
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $othinfo=$_POST['othinfo']; 
    $sql = "INSERT INTO `shimlatrip`.`participants` (`name`, `age`, `gender`, `email`, `phno`, `othinfo`, `dateofsub`) VALUES ('$name', '$age', '$gender', '$email', '$phno', '$othinfo', current_timestamp());";
    // echo $sql;

    if($conn->query($sql) == true) 
    {
        // echo "Successfully Inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql<br> $conn->error";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Shimla Trip Data Form</title>
</head>
<body> 
    <div class="container">
        <h2>
            Welcome to the Shimla Trip Application Form
        </h2>
        <p>Enter your details to enroll in this trip!</p>
        <?php
            if($insert==true){
            echo "<p class='note'>Thank You for showing your interest in this trip.You have succesfully filled this form to make it into the group of candidates for the trip!</p>";
            }
        ?>
        <form action="index2.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phno" id="phno" placeholder="Enter Your Phone Number">
            <textarea name="othinfo" id="othinfo" cols="30" rows="4" placeholder="Any other information you want to share regarding BNB, must visit places."></textarea>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
             </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    
</body>
</html>