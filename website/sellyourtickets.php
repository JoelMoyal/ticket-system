<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ticketsell.css" type="text/css">


</head>

<body>
    <?php
    include_once("dbconnect.php");
    $nameError = $emailError = $eventNameError = $locationError = $ticketPriceError = $ticketAmountError = $ticketCategorieError = $eventDate = $eventDateTo = $eventType = "";
    $name = $email = $eventName = $location = $description = $ticketCategorie = $ticketPrice = $ticketPrice2 = $ticketPrice3 = $ticketAmount = $eventDateError = $eventTypeError = "";


    if (empty($_POST["name"])) {
        $nameError = "Please enter a name";
    } else {
        $name = input($POST["name"]);

    }

    if (empty($_POST["email"])) {
        $emailError = "Please enter an email";
    } else if (isset($_POST["email"])) {
        $email = input($_POST["email"]);
    }
    $eventExists = 0;
    $sql = "SELECT name FROM EVENTS WHERE name = :name";
    $stmt = prepare($sql);
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
    if (empty($_POST["eventdate"])) {
        $eventDateError = "Please enter the date at which the event will take place";
    } else {
        $eventDate = input($_POST["eventdate"]);
    }
    if (empty($_POST["eventdateto"])) {
        $eventDateError = "Please enter the date at which the event will take place";
    } else {
        $eventDateTo = input($_POST["eventdateto"]);
    }
    if (empty($_POST["eventtype"])) {
        $eventTypeError = "Please enter the type of event you want to create";
    } else {
        $eventType = input($_POST["eventtype"]);
    }

    function input($data)
    {
        $data = htmlspecialchars($data);
        return $data;

        $sql = "INSERT INTO EVENTS (eventname, eventdate, eventtype ) VALUES (:eventname, :eventdate , :eventtype)";
        $stmt = $db->prepare($sql);
        $sqlSelect = "SELECT * FROM EVENTS";
        $stmt->bindParam(':eventname', $eventName, PDO::PARAM_STR);
        $stmt->bindParam(':eventdate', $eventDate, PDO::PARAM_STR);
        $stmt->bindParam(':eventtype', $eventtype, PDO::PARAM_STR);
        $stmt->execute();

        

    }
    ?>
    <h2> Sell your Ticket Request-Form </h2>
    <p><span class="error"> Fields marked with * are required for the request</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" placeholder="Full name" name="name" value="<?php echo $name; ?>">
        <span class="error">*
            <?php echo $nameError; ?>
        </span>
        <br><br>
        <input type="text" placeholder=" E-mail" name="email" value="<?php echo $email; ?>">
        <span class="error">*
            <?php echo $emailError; ?>
        </span>
        <br><br>
        Type of event:
        <input type="radio" name="ticketcategorie" <?php if (isset($ticketCategorie) && $ticketCategorie=="1")       echo
                "checked"; ?> value="1">Concert
        <input type="radio" name="ticketcategorie" <?php if (isset($ticketCategorie) && $ticketCategorie=="2")       echo
                "checked"; ?> value="2">Comedy
        <input type="radio" name="ticketcategorie" <?php if (isset($ticketCategorie) && $ticketCategorie=="3")       echo
                "checked"; ?> value="3">Sports
        <span class="error">*
            <?php echo $ticketCategorieError; ?>
        </span>
        <br><br>
        <input type="text" placeholder="Name of the Event" name="eventname" value="<?php echo $eventName; ?>">
        <span class="error">*
            <?php echo $eventNameError; ?>
        </span>
        <br><br>
        <input type="text" placeholder="The Event will take place at" name="location" value="<?php echo $location; ?>">
        <span class="error">*
            <?php echo $locationError; ?>
        </span>
        <br><br>


        How many Tickettypes:
        <input type="radio" name="ticketcategorie" <?php if (isset($ticketCategorie) && $ticketCategorie=="1")       echo
                "checked"; ?> value="1">1
        <input type="radio" name="ticketcategorie" <?php if (isset($ticketCategorie) && $ticketCategorie=="2")       echo
                "checked"; ?> value="2">2
        <input type="radio" name="ticketcategorie" <?php if (isset($ticketCategorie) && $ticketCategorie=="3")       echo
                "checked"; ?> value="3">3
        <span class="error">*
            <?php echo $ticketCategorieError; ?>
        </span>
        <br><br>
        <input type="text" placeholder="The standard ticket costs" name="ticketprice"
            value="<?php echo $ticketPrice; ?>">
        <span class="error">*
            <?php echo $ticketPriceError; ?>
        </span>
        <br><br>
        <input type="text" placeholder="The ticket of the second categorie costs" name="ticketprice2"
            value="<?php echo $ticketPrice2; ?>">

        <br><br>
        <input type="text" placeholder="The ticket of the third categorie costs" name="ticketprice3"
            value="<?php echo $ticketPrice3; ?>">

        <br><br>
        The event will take place from the: <input type="date" placeholder="MM-DD-YYYY" name="date"
            value="<?php echo $eventDate; ?>">
        <span class="error">*
            <?php echo $eventDateError; ?>
        </span>
        to the: <input type="date" placeholder="MM-DD-YYYY" name="date" value="<?php echo $eventDateTo; ?>">
        <span class="error">*
            <?php echo $eventDateError; ?>
        </span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>