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

    $sr_no = $_POST['sr_no'];
    $sr1 = $_POST['sr1'];
    $borrower_id = $_POST['borrower_id'];
    $ISBN = $_POST['ISBN'];
    $borrowed_from = $_POST['borrowed_from'];
    $borrowed_till = $_POST['borrowed_till'];
    $staff_id = $_POST['staff_id'];
    $class_id = $_POST['class_id'];

    if ($sr1 == 1) {
        $sql = "INSERT INTO `library_test`.`borrower` (`sr_no`, `borrower_id`, `ISBN`) VALUES ('$sr_no', '$borrower_id', '$ISBN');";
        // echo $sql;

        if($con->query($sql) == true){
            // echo "Succesfuly inserted";
            $insert = true;
        }
        else{
            echo "ERROR: $sql <br> &con->error";
        }
    }
    
    
    $sql = "INSERT INTO `library_test`.`borrow_dates` (`sr1`, `sr_no`, `borrowed_from`, `borrowed_till`, `staff_id`, `class_id`) VALUES ('$sr1', '$sr_no', '$borrowed_from', '$borrowed_till', '$staff_id', '$class_id');";
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
    <!-- <link rel="stylesheet" href="tablefix.css"> -->
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
            <li id="op2" onclick="sendto('addbook.php')">Add Book</li>
            <li id="op3" onclick="sendto('patrons.php')">Readers</li>
            <li id="op4" onclick="sendto('issues.php')" class="active">Issues</li>
            <li id="op6" onclick="sendto('index.php')">Log out</li>
        </ul>
    </div>
    <div class="container">
        <h1 class="title1">Issues</h1>

        <?php
        if ($insert == true){
            echo '<div class="message"><h3>Entry successful</h3></div>';
        }
        ?>

        <form action="" method="post" class="my-form">
        <div class="form-field">
            <label for="sr_no">Serial No.</label>
            <input type="number" name="sr_no" id="sr_no" placeholder="1,  2,  3, .." required />
        </div>
        <div class="form-field">
            <label for="sr1">Instance</label>
            <input type="number" name="sr1" id="sr1" placeholder="unique borrower and book" required />
        </div>
        <div class="form-field">
            <label for="borrower_id"">Borrower ID</label>
            <input type="number" name="borrower_id" id="borrower_id" placeholder="100XX" required />
        </div>
        <div class="form-field">
            <label for="ISBN"">ISBN</label>
            <input type="number" name="ISBN" id="ISBN" placeholder="5" required />
        </div>
        <div class="form-field">
            <label for="borrowed_from"">Borrowed From</label>
            <input type="date" name="borrowed_from" id="borrowed_from" placeholder="" required />
        </div>
        <div class="form-field">
            <label for="borrowed_till"">Borrowed Till</label>
            <input type="date" name="borrowed_till" id="borrowed_till" placeholder="" required />
        </div>
        <div class="form-field">
            <label for="staff_id"">Staff ID</label>
            <input type="number" name="staff_id" id="staff_id" placeholder="34" required />
        </div>
        <div class="form-field">
            <label for="class_id"">Class ID</label>
            <input type="text" name="class_id" id="class_id" placeholder="cl1" required />
        </div>

        <button type="submit">Add Now <span class="material-symbols-outlined">arrow_forward_ios</span></button>
        </form>


        <?php
                $server = "localhost";
                $username = "root";
                $password = "";
                $db = "library_test";
            
                $con = mysqli_connect($server, $username, $password, $db);
            
                if(!$con){
                    die("connection to this database failed due to".
                    mysqli_connect_error());
                }

                $sql = "SELECT borrow_dates.sr_no, sr1, borrower.borrower_id, class, title, borrowed_from, borrowed_till, staff_name FROM borrow_dates, borrower, class, staff, books WHERE borrow_dates.sr_no = borrower.sr_no AND borrow_dates.class_id = class.class_id AND borrow_dates.staff_id = staff.st_id AND borrower.ISBN = books.ISBN;";
                $result = $con->query($sql) or die("Bad Query: $sql");

            echo "<h1 class='title2'>Student</h2>";
            echo"<table border='1' class='pat-table styled-table' id='patTable'>";
            echo "<thead><th>Uinque ID</th><th>Instance</th><th>Borrower ID</th><th>Designation</th><th>Book Title</th><th>Borrowed On</th><th>Borrowed Till</th><th>Staff Present</th></thead>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['sr_no']}</td><td>{$row['sr1']}</td><td>{$row['borrower_id']}</td><td>{$row['class']}</td><td>{$row['title']}</td><td>{$row['borrowed_from']}</td><td>{$row['borrowed_till']}</td><td>{$row['staff_name']}</td></tr>";
            }
            echo "</table>";
        ?>

    </div>

    <script src="patrons.js"></script>
</body>
</html>