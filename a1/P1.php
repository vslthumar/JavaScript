
<!---
Name: Vishal Thumar
ID: 000765604
Date: 09/20/2018
--->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newfile.css">
    </head>
    <body>
        <form action="index.php" method="POST" ><button value="submit">Back to Home</button></form>
        <?php
        ///
        $firstSelection = $_POST["firstSelection"]; ///creating variable first selection for the user selecting fromthe select form
        $secondSelection = $_POST["secondSelection"]; ///creating variable second selection for the user selecting fromthe select form
        $min = $_POST["min"]; ///variable for min 
        $max = $_POST["max"]; ///variable for max
        $step = $_POST["steps"]; ///variable for counting steps
        $output = ''; ///variable for storing the output
        ///creating table for output
        echo "<table border=2 id='t1'><tr><th>$firstSelection</th><th>$secondSelection</th></tr>";
        ///using the if condition for min max and which counts the step for user
        if ($min < $max && $step >= 0 && $min >= 0 && $max >= 0 && $step < $max && $step > $min) {
            for ($i = $min; $i <= $max; $i = $i + $step) {
                ///switch case for calculating output by user selection from both drop down menus. 
                switch ($firstSelection) {
                    case "Miles":
                        switch ($secondSelection) {
                            case "Miles":
                                $output = $i;
                                break;

                            case "KM":
                                $output = $i * 1.61;
                                break;

                            case "Meters":
                                $output = $i * 1609.34;
                                break;

                            case "Feet":
                                $output = $i * 5280;
                                break;

                            case "Inches":
                                $output = $i * 63360;
                                break;

                            case "CM":
                                $output = $i * 160934;
                                break;
                        }
                        break;

                    case "KM":

                        switch ($secondSelection) {
                            case "Miles":
                                $output = $i * 0.62;
                                break;

                            case "KM":
                                $output = $i;
                                break;
                            case "Meters":
                                $output = $i * 1000;
                                break;
                            case "Feet":
                                $output = $i * 3280.84;
                                break;
                            case "Inches":
                                $output = $i * 39370.1;
                                break;
                            case "CM":
                                $output = $i * 100000;
                                break;
                        }
                        break;

                    case "Meters":
                        switch ($secondSelection) {
                            case "Miles":
                                $output = $i * 0.00062;
                                break;
                            case "KM":
                                $output = $i * 0.001;
                                break;
                            case "Meters":
                                $output = $i;
                                break;
                            case "Feet":
                                $output = $i * 3.28;
                                break;
                            case "Inches":
                                $output = $i * 39.37;
                                break;
                            case "CM":
                                $output = $i * 100;
                                break;
                        }
                        break;

                    case "Feet":
                        switch ($secondSelection) {
                            case "Miles":
                                $output = $i * 0.00019;
                                break;
                            case "KM":
                                $output = $i * 0.0003;
                                break;
                            case "Meters":
                                $output = $i * 0.3;
                                break;
                            case "Feet":
                                $output = $i;
                                break;
                            case "Inches":
                                $output = $i * 12;
                                break;
                            case "CM":
                                $output = $i * 30.48;
                                break;
                        }
                        break;

                    case "Inches":
                        switch ($secondSelection) {
                            case "Miles":
                                $output = $i / 63360;
                                break;
                            case "KM":
                                $output = $i / 39370.1;
                                break;
                            case "Meters":
                                $output = $i * 0.025;
                                break;
                            case "Feet":
                                $output = $i * 0.083;
                                break;
                            case "Inches":
                                $output = $i;
                                break;
                            case "CM":
                                $output = $i * 2.54;
                                break;
                        }
                        break;

                    case "CM":
                        switch ($secondSelection) {
                            case "Miles":
                                $output = $i / 160934;
                                break;
                            case "KM":
                                $output = $i / 100000;
                                break;
                            case "Meters":
                                $output = $i * 0.01;
                                break;
                            case "Feet":
                                $output = $i * 0.033;
                                break;
                            case "Inches":
                                $output = $i * 0.39;
                                break;
                            case "CM":
                                $output = $i;
                                break;
                        }
                        break;
                }
                echo "<tr><td>$i</td><td>$output</td></tr>"; //display output in the table 
            }
            echo "</table";
        } else {
            echo "<p>Invalid Input.</p>"; // if the input is invalid, show error output.
        }
        ?>



    </body>
</html>