<!---
Name: Vishal Thumar
ID: 000765604
Date: 10/05/2018
--->

<!-- This is the php list builder page where the the list is made by the user input of items-->

<html>
    <head>
        <title>Lab-2</title>

        <style>
            body{
                background-color: darkgray;
            }
            table{
                background-color: lightgray;
                width: 500px;
                margin-bottom: 15px;
                text-align: center;
                border: 5px;
            }
            div{
                text-align: center;
            }
            input[type="text"] {
                width: 500px;

                margin-bottom: 15px;
                text-align: center;
            }

        </style>
    </head>
    <body>

        <!--providing the same page link to get output on the same page as a list -->
        <form action = "theListBuilderPage.php" method="GET">
            Enter the Name of the item you want to add in the list: <input type="text" name="data">
            <input type="submit" name="submit" value="Add">
            <input type = "submit"  name="Finish" value="Finish" formaction ="theSummaryPage.php">
        </form>

        <?php
        session_start();
        
        //checking parameters
        if (!isset($_SESSION["total"])) {
            $_SESSION["total"] = 0;
            $_SESSION["input"] = Array();
        }
        if (isset($_GET['data'])) {
            $amount = $_GET['data'];
            $_SESSION["total"] += $amount;
            $_SESSION["input"][count($_SESSION["input"])] = $amount;
        }
        $total = $_SESSION["total"];
        $arraylist = $_SESSION["input"];


        // making an array, store values in the array list for the output of list of items
        if (count($arraylist) >= 0) {
            ?>
            <table border="1" >
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                </tr>
                <?php
                for ($i = 0; $i < count($arraylist); $i++) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $i + 1; ?>
                        </td>
                        <td>
                            <?php echo $arraylist[$i]; ?>
                        </td>		

                        <?php
                    }
                }
                ?>
        </table>
    </body>
</html>


