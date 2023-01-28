<?php
$login = false;
if(isset($_POST['user_id'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "library_test";

    $con = mysqli_connect($server, $username, $password, $db);

    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }

    // echo "Success connectiong to the db";

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
          
    $sql= "Select * from admin_login where user_id ='$user_id' and password = '$password'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        $login=true;
        session_start();
        $_SESSION['logged in'] = true;
        $_SESSION['user_id'] = $user_id;
        header("location:reader.html");
    }
    else {
        $showError="Username Password not match";
    }

    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="container">
        <div class="login-tab">
            <h1 class="title">Book Kingdom</h1>
            <?php
            if (isset($_POST['user_id'])) {
                echo '<h3>Username and password not match</h3>';
            }
            ?>
            <form class="form" action="" method="post">
                <input type="text" name="user_id" id="user_id" placeholder="username" autofocus required>
                <input type="password" name="password" id="password" placeholder="password" autofocus required>
                <button id="gotoreader" class="submit-button">Log in    <span class="material-symbols-rounded">arrow_forward_ios</span></button>
                    <!-- Make this button -->
            </form>
            <!-- <div class="message">
                <p>Are you a member? Log in <span>here</span></p>
            </div> -->
        </div>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `patorns` (`srno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'anonymous kumar', '18', 'male', 'annms2004@gmail.com', '8080370344', 'nothing much to say really', current_timestamp()); -->
</body>
</html>