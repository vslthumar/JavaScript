<!---
Name: Vishal Thumar
ID: 000765604
Date: 10/05/2018
--->

<!-- This is the php summary page where all the informations are displayed to the user as output.-->

<?php
session_start();
?>
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
        h1,h2{
            text-align: center;

        }
    </style>
</head>

<body>
    <h1> Info. of Store:<?php
        echo $_SESSION["name"]; //getting store name which is stored in session
        ?> </h1>
    <h2>List of Items</h2>

    <!--getting all the information of items as a list in a table -->
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Name</th>
        </tr>
        <?php
        $arraylist = $_SESSION["input"];

        if (count($arraylist) > 0) {

            for ($i = 0; $i < count($arraylist); $i++) {
                ?>      
                <tr>
                    <td>
                        <?php
                        echo $i + 1;
                        ?></td> 
                    <td>
                        <?php
                        echo $arraylist[$i];
                        ?></td>
                </tr>

                <?php
            }
            ?></table><?php
    }

    session_destroy();
    ?>



</body>
</html>