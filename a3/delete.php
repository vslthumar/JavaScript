<!DOCTYPE html>
<!--
this is the insert page which allows user to delete data.
-->
<html>
    <head>
        <title>Options</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <p>select row to delete</p>
        <form action="delete.php" method="post">
            <button onclick="delete.php" method="post" name='delete'>delete</button>
            <?php
            session_start();//session start
            //databse connectivity with exception handling
            try {
                $dbh = new PDO("mysql:host=localhost;dbname=000765604", "000765604", "19941022");
            } catch (Exception $e) {
                die("Error connecting to database");
            }
            //sql query to fetch data
            $sql = "Select * from Student";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $fname = [];
            $lname = [];
            $sid = [];
            $total = [];
            $date = [];
            $comment = [];
            $head = ["", "First Name", "Last Name", "Student ID", "Marks", "Date", "Comments"];
            //fetching data in arrays
            while ($row = $stmt->fetch()) {
                array_push($fname, $row['FirstName']);
                array_push($lname, $row['LastName']);
                array_push($sid, $row['StudentID']);
                array_push($total, $row['TotalMarks']);
                array_push($date, $row['CompletionDate']);
                array_push($comment, $row['Comments']);
            }
            //show the result as a table format with radio button to give user option to delete the data
            echo "<table border=1>";
            for ($i = 0; $i <= 6; $i++) {
                echo "<th>$head[$i]</th>";
            }
            for ($i = 0; $i < count($sid); $i++) {
                echo "<tr><td><input type='radio' value='$sid[$i]' name='radio'><td> $fname[$i] </td><td> $lname[$i] </td><td> $sid[$i]</td><td>$total[$i]</td><td>$date[$i]</td><td>$comment[$i]</td></tr>";
            }
            //if user click delete button, validate the radio button by the student id

            if (isset($_POST['delete'])) {

                $sd = filter_input(INPUT_POST, 'radio');
                //database connectivity with exception handling
                try {
                    $dbh = new PDO("mysql:host=localhost;dbname=000765604", "000765604", "19941022");
                } catch (Exception $e) {
                    die("Error connecting to database");
                }
                //sql query to delete the data
                $sql = "DELETE FROM `Student` WHERE `Student`.`StudentID` = '$sd'";
                $stmt = $dbh->prepare($sql);
                $result = $stmt->execute();
                if ($result) {
                    echo 'Success';
                } else {
                    echo 'fail';
                }
            }
            ?>




        </form>

        <!--back to display page link-->
        <a href="display.php">back</a>


    </body>
</html>