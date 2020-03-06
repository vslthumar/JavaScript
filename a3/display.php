
<!DOCTYPE html>
<!--
this is the display page which allows user to show data from database after retrieving it'dand also gives option to insert, update and delete data.
-->
<html>
    <head>
        <title>Options</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <p>Log in successful</p>
        click here to &nbsp; &nbsp; <a href="insert.php">insert</a> &nbsp; &nbsp; <a href="update.php">update</a> &nbsp;  &nbsp;<a href="delete.php">delete</a>&nbsp;  &nbsp; 
        <?php
        //session start
        session_start();
        //connects to database 
        //also catch exception
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=000765604", "000765604", "19941022");
        } catch (Exception $e) {
            die("Error connecting to database");
        }
        //sql query and execution to show all the data from database
        $sql = "Select * from Student";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $fname = [];
        $lname = [];
        $sid = [];
        $total = [];
        $date = [];
        $comment = [];
        $head = ["First Name", "Last Name", "Student ID", "Marks", "Date", "Comments"];
        //fetching data and push them into arrays
        while ($row = $stmt->fetch()) {
            array_push($fname, $row['FirstName']);
            array_push($lname, $row['LastName']);
            array_push($sid, $row['StudentID']);
            array_push($total, $row['TotalMarks']);
            array_push($date, $row['CompletionDate']);
            array_push($comment, $row['Comments']);
        }
        //showing output in the table
        echo "<table border=1>";
        for ($i = 0; $i < 6; $i++) {
            echo "<th>$head[$i]</th>";
        }
        for ($i = 0; $i < count($sid); $i++) {
            echo "<tr><td> $fname[$i] </td><td> $lname[$i] </td><td> $sid[$i]</td><td>$total[$i]</td><td>$date[$i]</td><td>$comment[$i]</td></tr>";
        }
        ?>
        <!-- logout link-->
        <a href="logout.php" id="logout">Logout</a>

    </body>
</html>

