<?php
/*
 *  Vishal Thumar 000765604, 09 december 2018
 * # I, Vishal Thumar, student number 000765604, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
 */
try {
    $dbh = new PDO('mysql:host=localhost;dbname=000765604', "000765604", "19941022");
} catch (Exception $e) {
    die('Could not connect to DB: ' . $e->getMessage());
}

?>
