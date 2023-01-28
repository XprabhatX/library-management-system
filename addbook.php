<?php
$insert = false;
if(isset($_POST['ISBN'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to".
        mysqli_connect_error());
    }

    // echo "Success connectiong to the db";

    $ISBN = $_POST['ISBN'];
    $title = $_POST['title'];
    $pub_year = $_POST['pub_year'];
    $copies = $_POST['copies'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO `library_test`.`books` (`ISBN`, `title`, `pub_year`, `copies`, `price`) VALUES ('$ISBN', '$title', '$pub_year', '$copies', '$price');";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Succesfuly inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> &con->error";
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
    <title>Reader</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/patrons.css">
    <link rel="stylesheet" href="./styles/default_form.css">
    <!-- Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <script>
        function sendto(link) {
            // alert('you wanna go to ' + link);
            window.location.href = link;
        }
    </script>

    <div class="sidebar">
        <div class="icon-wrap"><img class="person-icon" src="person-icon.png"></img></div>
        <ul style="list-style-type: none;">
            <li id="op1" onclick="sendto('books.php')">Book</li>
            <li id="op2" onclick="sendto('addbook.php')" class="active">Add Book</li>
            <li id="op3" onclick="sendto('patrons.php')">Readers</li>
            <li id="op4" onclick="sendto('issues.php')">Issues</li>
            <li id="op6" onclick="sendto('index.php')">Log out</li>
        </ul>
    </div>
    <div class="container">
        <h1 class="title1">Add a New Book</h1>

        <?php
        if ($insert == true){
            echo '<div class="message"><h3>Your book called '.`$title`.' is added</h3></div>';
        }
        ?>

        <form action="" method="post" class="my-form">
        <div class="form-field">
            <label for="ISBN">ISBN</label>
            <input type="number" name="ISBN" id="ISBN" placeholder="1,  2,  3, .." required />
        </div>
        <div class="form-field">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="The Jungle Book" required />
        </div>
        <div class="form-field">
            <label for="pub_year"">Published Year</label>
            <input type="number" name="pub_year" id="pub_year" placeholder="1894" required />
        </div>
        <div class="form-field">
            <label for="copies"">Copies</label>
            <input type="number" name="copies" id="copies" placeholder="40" required />
        </div>
        <div class="form-field">
            <label for="price"">price</label>
            <input type="number" name="price" id="price" placeholder="199" required />
        </div>

        <button type="submit">Add Now <span class="material-symbols-outlined">
arrow_forward_ios
</span></button>
            </form>

    </div>

    <script src="patrons.js"></script>
</body>
</html>