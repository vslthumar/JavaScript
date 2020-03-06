<!---
Name: Vishal Thumar
ID: 000765604
Date: 10/05/2018
--->

<!-- This is the php validation page where the input by users are checked and validate if it's right or not.-->

<head>

    <title>Lab-2</title>
    <style>
        body{
            background-color: darkgray;
        }
        p{
            background-color: lightgray;
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


<?php
session_start();



//variable diclaration and get input from html index page by GET method
$name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_GET, "address", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_GET, "city", FILTER_SANITIZE_STRING);
$postal = filter_input(INPUT_GET, "postal", FILTER_SANITIZE_STRING);
$error = TRUE;
$_SESSION['name'] = $name;

//checking conditions for the null values or invalid inputs for all the inputs user entered in the form. 
if ($name != null) {
    $nameMessage = "<p>Name is Valid</p>";
} else {
    $nameMessage = "<p>Name is required</p>";
    $error = FALSE;
}

if ($address != null) {
    if (preg_match('/^[0-9]+\s+[A-Z][a-z]+\s+((st.)|(blvd.)|(ave.)|(rd.))+\s+((E)|(S)|(N)|(W))?/', $address) == 0) {
        $addressMessage = "<p>Invalid Address</p>";
        $error = FALSE;
    } else {
        $addressMessage = "<p>Address is Valid<p>";
    }
} else {
    $addressMessage = "<p>Address is required</p>";
    $error = FALSE;
}

if ($city != null) {
    if (preg_match('/[A-Z][a-z]*/', $city) == 0) {
        $cityMessage = "<p>Invalid City<p>";
        $error = FALSE;
    } else {
        $cityMessage = "<p>City is Valid</p>";
    }
} else {
    $cityMessage = "<p>City is required</p>";
    $error = FALSE;
}

if ($postal != null) {
    if (preg_match('/[A-Z][0-9][A-Z] ?[0-9][A-Z][0-9]$/', $postal) == 0) {
        $postalMessage = "<p>Invalid Postal-code</p>";
        $error = FALSE;
    } else {
        $postalMessage = "<p>Postal-code is valid</p>";
    }
} else {
    $postalMessage = "<p>Postal-code is required</p>";
    $error = FALSE;
}

//printing all the messages to let the user know either inputs are valid or invalid
echo "$nameMessage $addressMessage $cityMessage $postalMessage";

// providing link to go further or back as per the conditions.
if ($error) {
    ?>
    <a href="theListBuilderPage.php" >Get Started</a>
    <?php
} else {
    ?>
    <a href="index.html" >Try Again!!</a>
    <?php
}
?>