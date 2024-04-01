<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ticketsell.css" type="text/css">



    <?php
include_once("dbconnect.php");
$nameError = $emailError = $eventNameError = $locationError = $ticketPriceError = $ticketAmountError = $ticketCategorieError = "";
$name = $email = $eventName = $location = $description = $ticketCategorie = $ticketPrice = $ticketPrice2 = $ticketPrice3 = $ticketAmount = "";

if ($_SERVER["REQUEST METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameError = "Please enter a name";
    } else {
        $name = input($POST["name"]);
        
    }

    if (empty($_POST["email"])) {
        $emailError = "Please enter an email";
    } else {
        $email = input($_POST["email"]);
    }
    $eventExists = 0;
    $sql = "SELECT name FROM EVENTS WHERE name = :name";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":name", $_POST["eventname"]);
    $stmt->execute();
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $eventExists = 1;
    } else {
        $eventExists = 0;
    }
    $stmt->closeCursor();

    if ($eventExists = 0) {
        $eventName = input($_POST["eventname"]);

    } else if ($eventExists = 0) {
        $eventNameError = "Eventname is currently used by different Event for sale on the Website";
    } else if (empty($_POST["event"])) {
        $eventNameError = "Please enter a name for your event";

    }
    if (empty($_POST["location"])) {
        $locationError = "Please enter a location for your event";
    } else {
        $location = input($_POST["location"]);
    }
    if (empty($_POST["ticketcategorie"])) {
        $ticketCategorieError = "Please enter the amount of Ticketcategories for your event";
    } else {
        $ticketCategorie = input($_POST("ticketcategorie"));

    }
    if (empty($_POST["ticketprice"])) {
        $ticketPriceError = "Please enter a price for the tickets for your event";
    } else {
        $ticketPrice = input($_POST["ticketprice"]);
    }
    if (empty($_POST["ticketprice2"])) {
        $ticketPrice2 = "";
    } else {
        $ticketPrice2 = input($_POST["ticketprice2"]);
    }
    if (empty($_POST["ticketprice3"])) {
        $ticketPrice3 = "";
    } else {
        $ticketPrice3 = input($_POST["ticketprice3"]);
    }
    if (empty($_POST["ticketamount"])) {
        $ticketAmountError = "Please enter the amount of tickets available for your event";
    } else {
        $ticketAmount = input($_POST["ticketamount"]);
    }
}
function input($data){
    $data = htmlspecialchars($data);
    return $data;
}
?>
<h2> Sell your Ticket Request-Form </h2>
<p><span class="error"> Fields marked with * are required for the request</span></p>
<form method="post" action="<?php echo
    htmlspecialchars($_SERVER["PHP_SELF"]);?>">
