<!DOCTYPE html>
<!--
Name: Vishal Thumar
Student ID: 000765604
This is the index login page which allows user to login and move to another page if succeed
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <h1>Login</h1>
            User: <input type="text" name="user" >
            Password: <input type="password" name="password">
            <button type="submit" value="submit" name="submit" method="POST" >Submit</button>


            <?php
            //session start
            session_start();
            $submit = @$_POST['submit'];
            if (isset($submit)) {
                //input validation for userid and password when user click button
                $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
                $_SESSION['user'] = $user;
                $pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                $_SESSION["password"] = $pass;
                //checking conditions if userid and password are correct.
                if ($user == "admin" && $pass == "admin") {
                    echo "<p>Login Sucsessful. <a href='display.php' >Click here</a></p>";
                } elseif ($user = "" || $pass == "") {
                    echo "<p>User Name and Password are required.</p>";
                } else {
                    echo "";
                }
            }
            ?>
        </form> 
    </body>
</html>
