<!DOCTYPE html>
<!--
this is the insert page which allows user to insert data.
-->
<html>
    <head>
        <title>Options</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <p>Insert data into table</p>
        <form action="insert.php" method="post">
            <button  method="post" name='insert'>insert</button>

            <?php
            //displaying all the data by retriving from display page
            include('display.php');
            //text fields to insert data into table
            echo "<tr><td> <input type='text' name='fname'> </td><td> <input type='text' name='lname'> </td><td> <input type='number' name='sid'></td><td><input type='number' name='total'></td><td><input type='date' name='date'></td><td><input type='text' name='comment'></td></tr>";
            //input validation when user click the button
            if (isset($_POST['insert'])) {
                $fn = filter_input(INPUT_POST, 'fname');
                $ln = filter_input(INPUT_POST, 'lname');
                $sd = filter_input(INPUT_POST, 'sid');
                $ttl = filter_input(INPUT_POST, 'total');
                $dt = $_POST['date'];
                $cmt = filter_input(INPUT_POST, 'cmt');
                //connect to the database
                try {
                    $dbh = new PDO("mysql:host=localhost;dbname=000765604", "000765604", "19941022");
                } catch (Exception $e) {
                    die("Error connecting to database");
                }
                //sql insert query
                $sql = "INSERT INTO `Student`(`FirstName`, `LastName`, `StudentID`, `TotalMarks`, `CompletionDate`, `Comments`) VALUES ('$fn','$ln','$sd','$ttl','$dt','$cmt')";
                $stmt = $dbh->prepare($sql);//statement
                $result = $stmt->execute();//execution
                if ($result) {
                    echo 'Success';
                } else {
                    echo 'fail';
                }
            }
            ?>
            <a href="display.php">back</a>
        </form>

    </body>
</html>