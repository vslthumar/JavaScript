<?php
/*
 * Vishal Thumar 000765604, 09 december 2018
 * # I, Vishal Thumar, student number 000765604, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
 */
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
header("Access-Control-Allow-Origin: *");
include "connect.php";


if (isset($_REQUEST["request"]) && isset($_REQUEST["notification"])) {
    $notification = $_REQUEST["notification"];
    $command = "INSERT INTO  `DataNotifications` (  `Notification` , `Read`) VALUES (?,?);";
    $userParams = [$notification , 0 ];
    $stmt = $dbh->prepare($command);
    $result = $stmt->execute($userParams);
    if ($result) {
            $msg = "Insert successful (ID={$dbh->lastInsertId()})";
        } else {
            $msg = "Insert failed";
        }
    
    $command = "SELECT * FROM `DataNotifications` WHERE `Read` = 0";
    $stmt = $dbh->prepare($command);
    $stmt->execute();
    $Notifies = [];
    while ($row = $stmt->fetch()) {
        array_push($Notifies, new Message(utf8_encode($row["ID"]), utf8_encode($row["Notification"]), utf8_encode($row["Read"])));
    }
header("Content-Type: application/json");
echo json_encode($Notifies);
}
?>
