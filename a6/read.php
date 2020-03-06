<?php

/*
 * A server to return a json-encoded list of notification that has not been read.
 * Vishal Thumar 000765604, 09 december 2018
 * # I, Vishal Thumar, student number 000765604, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
 */
header("Access-Control-Allow-Origin: *");
include "connect.php";

class Message {

    public $ID;
    public $Notification;
    public $Read;

    function __construct($ID, $Notification, $Read) {
        $this->ID = $ID;
        $this->Notification = $Notification;
        $this->Read = $Read;
    }

    function outputRow() {
        return "<tr><td>$this->ID</td><td>$this->Notification</td><td>$this->Read</td></tr>";
    }

}

if (isset($_REQUEST["request"])) {
    $command = "SELECT * FROM `DataNotifications` where `Read` = 0";
    $stmt = $dbh->prepare($command);
    $stmt->execute();
    $Notifies = [];
    while ($row = $stmt->fetch()) {
        array_push($Notifies, new Message(utf8_encode($row["ID"]), utf8_encode($row["Notification"]), utf8_encode($row["Read"])));
    }
    $command = "UPDATE `DataNotifications` SET `Read`= 1 WHERE `Read` = 0 ;";
    $stmt = $dbh->prepare($command);
    $success = $stmt->execute();
    
header("Content-Type: application/json");
echo json_encode($Notifies);
}