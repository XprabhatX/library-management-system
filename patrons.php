<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader</title>
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/patrons.css">
    <!-- Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
            <li id="op3" onclick="sendto('patrons.php')" class="active">Readers</li>
            <li id="op4" onclick="sendto('issues.php')">Issues</li>
            <li id="op6" onclick="sendto('index.php')">Log out</li>
        </ul>
    </div>
    <div class="container">
            <h1 class="title1">Patrons</h1>

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

                $sql = "SELECT s_id, student_name, department_name, borrower_id FROM student,department WHERE student.department_id = department.department_id;";
                $result = $con->query($sql) or die("Bad Query: $sql");

            echo "<h1 class='title2'>Student</h2>";
            echo"<table border='1' class='pat-table styled-table' id='patTable'>";
            echo "<thead><th>Student ID</th><th>Name</th><th>Department</th><th>Borrower ID</th></thead>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['s_id']}</td><td>{$row['student_name']}</td><td>{$row['department_name']}</td><td>{$row['borrower_id']}</td></tr>";
            }
            echo "</table>";

            $sql = "SELECT f_id, faculty_name, department_name, borrower_id FROM faculty,department WHERE faculty.department_id = department.department_id;";
            $result = $con->query($sql) or die("Bad Query: $sql");

            echo "<h1 class='title2'>Faculty</h2>";
            echo"<table border='1' class='pat-table styled-table' id='patTable'>";
            echo "<thead><th>Faculty ID</th><th>Name</th><th>Department</th><th>Borrower ID</th></thead>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['f_id']}</td><td>{$row['faculty_name']}</td><td>{$row['department_name']}</td><td>{$row['borrower_id']}</td></tr>";
            }
            echo "</table>";

            $sql = "SELECT st_id, staff_name, borrower_id FROM staff;";
            $result = $con->query($sql) or die("Bad Query: $sql");

            echo "<h1 class='title2'>Staff</h2>";
            echo"<table border='1' class='pat-table styled-table' id='patTable'>";
            echo "<thead><th>Staff ID</th><th>Name</th><th>Borrower ID</th></thead>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['st_id']}</td><td>{$row['staff_name']}</td><td>{$row['borrower_id']}</td></tr>";
            }
            echo "</table>";
            ?>
    </div>

    <script src="patrons.js"></script>
</body>
</html>