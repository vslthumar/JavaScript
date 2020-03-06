
<!---
Name: Vishal Thumar
ID: 000765604
Date: 09/20/2018
--->
<!-- This is the display page where user can input numbers in text box and click the button for output, 
by taking the program to php page to calculate the output. 
-->
<html>
    <head>
        <title>Assignment-1 : Distance Conversion</title>
        <link rel="stylesheet" type="text/css" href="newfile.css">
    </head>
    <body>
        <h1>Distance Conversion</h1>
        <form action="P1.php" method="POST" >
            Convert
            <!-- drop down for first selection-->
            <select name="firstSelection">
                <option value="Miles">Miles</option>
                <option value="KM">KM</option>
                <option value="Meters">Meters</option>
                <option value="Feet">Feet</option>
                <option value="Inches">Inches</option>
                <option value="CM">CM</option>
            </select>
            To
            <!-- drop down for second selection-->
            <select name="secondSelection">
                <option value="Miles">Miles</option>
                <option value="KM">KM</option>
                <option value="Meters">Meters</option>
                <option value="Feet">Feet</option>
                <option value="Inches">Inches</option>
                <option value="CM">CM</option>
            </select>
            <br>
            <!-- text input area for minimum, maximum and difference-->
            Min. value <input type="number" name="min" >
            Max. value <input type="number" name="max" >
            Difference <input type="number" name="steps" >
            <button type="submit" value="submit">Submit</button>
        </form>



    </body>
</html>