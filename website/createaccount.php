
<?php
require("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="help.css" type="text/css">
    

    <title>Help - Tickify</title>
</head>
<nav class="nav">
    <div class="logo">
        <a href="index.php"><img src="image/Unbenannt-3-[Wiederhergestellt].png"  /></a>
      
    </div>
    <div id="mainListDiv" class="main_list">
      <ul class="navlinks">
        
        <li class="navlink"><a href="./html/aboutus.html">About us</a></li>
        <li class="navlink"><a href="./html/ticketsell.html">Sell your Tickets!</a></li>
        <div class="basket">
        <a href=".html/basket.html"><img src="image/basket.png"></a></li>
      </div>
      
      <div class="popup" onclick="myFunction()"> <img src="image/profilebannner.png">
        <span class="popupcontent" id="profilepopup">
          <li class="popuplink"><a href="./html/accountpage.html"></a>My Account</li>
          <li class="popuplink"><a href="./html/myorders.html"></a>My Orders</li>
          <li class="popuplink">Log out</li>
        </span>

      </div>
      <script>
        
        function myFunction() {
          var popup = document.getElementById("profilepopup");
          popup.classList.toggle("show");
        }
        </script>
      <li class="navlink">
          <a href=""></a>
        </li>
        
      </ul>
      </div>
    
    <span class="navTrigger">
      <i></i>
      <i></i>
      <i></i>
    </span>
  </nav>


</nav>
<body>
    <?php
    if(isset($_POST["submit"])){
      require("dbconnect.php");
      $stmt = $conn->prepare("SELECT * FROM käufer WHERE email = :email"); //Username überprüfen
      $stmt->bindParam(":email", $_POST["email"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0){
        //Username ist frei
        if($_POST["pw"] == $_POST["pw2"]){
          //User anlegen
          $stmt = $conn->prepare("INSERT INTO käufer (email, password) VALUES (:email, :pw)");
          $stmt->bindParam(":email", $_POST["email"]);
          $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
          $stmt->bindParam(":pw", $hash);
          $stmt->execute();
          echo "Dein Account wurde angelegt";
        } else {
          echo "Die Passwörter stimmen nicht überein";
        }
      } else {
        echo "Die email ist bereits vergeben";
      }
    }
     ?>
    <h1>Account erstellen</h1>
    <form action="register.php" method="post">
      <input type="text" name="email" placeholder="email" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
      <button type="submit" name="submit">Create</button>
    </form>
    <br>
    <a href="login.php">Hast du bereits einen Account?</a>
  </body>
  </html>
<footer>

</footer>