<!DOCTYPE html>
<!--
this is the insert page which allows user to update data.
-->
<html>
    <head>
        <title>Options</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <p>Update data into table</p>
        <form action="update.php" method="post">
            <button onclick="update.php" method="post" name='update'>Update</button>
            <?php
            session_start();//session start
            //database connectivity with exception handling
            try {
                $dbh = new PDO("mysql:host=localhost;dbname=000765604", "000765604", "19941022");
            } catch (Exception $e) {
                die("Error connecting to database");
            }
            //sql query to show all the data
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
            //fetching data into arrays
            while ($row = $stmt->fetch()) {
                array_push($fname, $row['FirstName']);
                array_push($lname, $row['LastName']);
                array_push($sid, $row['StudentID']);
                array_push($total, $row['TotalMarks']);
                array_push($date, $row['CompletionDate']);
                array_push($comment, $row['Comments']);
            }
            //showing data in table as input field so user can update them
            echo "<table border=1>";
            for ($i = 0; $i < 6; $i++) {
                echo "<th>$head[$i]</th>";
            }
            for ($i = 0; $i <= (count($sid) - 1); $i++) {
                echo "<tr><td> <input type='text' value='$fname[$i]' name='$fname[$i]'> </td><td> <input type='text' value='$lname[$i]' name='$lname[$i]'> </td><td> $sid[$i]</td><td><input type='number' value='$total[$i]' name='$total[$i]'></td><td><input type='date'value='$date[$i]' name='$date[$i]'></td><td><input type='text' value='$comment[$i]' name='$comment[$i]'></td></tr>";
            }

            $fn = [];
            $ln = [];
            $sd = [];
            $ttl = [];
            $dt = [];
            $cmt = [];
            $fnn = [];
            //input validation for user input
            if (isset($_POST['update'])) {
                for ($i = 0; $i <= (count($sid) - 1); $i++) {
                    $fn[$i] = filter_input(INPUT_POST, "$fname[$i]", FILTER_SANITIZE_STRING);
                    $_SESSION[$fnn[$i]] = $fn[$i];
                    $ln[$i] = filter_input(INPUT_POST, "$lname[$i]", FILTER_SANITIZE_STRING);
                    $ttl[$i] = filter_input(INPUT_POST, "$total[$i]", FILTER_VALIDATE_INT);
                    $dt[$i] = filter_input(INPUT_POST, "$date[$i]");
                    $cmt[$i] = filter_input(INPUT_POST, "$comment[$i]", FILTER_SANITIZE_STRING);
                }
                //database connectivity with exception handling
                try {
                    $dbh = new PDO("mysql:host=localhost;dbname=000765604", "000765604", "19941022");
                } catch (Exception $e) {
                    die("Error connecting to database");
                }
                //store all the data into arrays and run the sql update query to update all the data.
                $sqll = [];
                $stmtt = [];
                $resultt = [];
                for ($i = 0; $i <= (count($sid) - 1); $i++) {
                    $sqll[$i] = "UPDATE  `000765604`.`Student` SET  `FirstName` =  '$fn[$i]', `LastName` =  '$ln[$i]', `StudentID` =  '$sid[$i]', `TotalMarks` =  '$ttl[$i]', `CompletionDate` =  '$dt[$i]', `Comments` =  '$cmt[$i]' WHERE  `Student`.`StudentID` =$sid[$i]";
                    $stmtt[$i] = $dbh->prepare($sqll[$i]);
                    $resultt[$i] = $stmtt[$i]->execute();
                    if ($resultt[$i]) {
                        echo 'Success';
                    } else {
                        echo "fail";
                    }
                }
            }
            ?>





        </form>


        <a href="display.php">back</a>


    </body>
</html>