<?php
include_once 'dbconnect.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="accountpage" href="accountpage.html" type="text/html">
	<link rel="basket" href="basket.html" type="text/html">
	<link rel="help" href="help.html" type="text/html">
	<link rel="terms" href="terms.html" type="text/html">
	<link rel="imprint" href="imprint.html" type="text/html">
	<link rel="ticketsell" href="sellyourtickets.php" type="text/html">
	<link rel="dataprotection" href="dataprotection.html" type="text/html">
	<link rel="about us" href="aboutus.html" type="text/html">
	<link rel="searchbar" href="searchbar.css" type="text/css"> 
	<link rel="footer" href="footer.css" type="text/css">
	<link rel="header" href="header.css" type="text/css">
	<link rel="stylesheet" href="stylesheet.css" type="text/css">
  <link rel="stylesheet" href="backgroundpic.css" type="text/css">
  
  <title>Tickify</title>
</head>



	<nav class="nav">
      <div class="logo">
          <a href="index.css"><img src="image/Unbenannt-3-[Wiederhergestellt].png"  /></a>
        
      </div>
      <div id="mainListDiv" class="main_list">
        <ul class="navlinks">
          
          <li class="navlink"><a href="aboutus.html">About us</a></li>
          <li class="navlink"><a href="sellyourtickets.php">Sell your Tickets!</a></li>
          <div class="basket">
          <a href="basket.html"><img src="image/basket.png"></a></li>
        </div>
        
        <div class="popup" onclick="myFunction()"> <img src="image/profilebannner.png">
          <span class="popupcontent" id="profilepopup">
            <li class="popuplink"><a href="/html/accountpage.html"></a>My Account</li>
            <li class="popuplink"><a href="/html/myorders.html"></a>My Orders</li>
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
            try{
                $username = "prj1_user";
                $password = "prj1_password";
                $db = new PDO("pgsql:host=db;port=5432;dbname=prj1", $username, $password);
                print('<span class="success">Working &#128526</span>');
            }catch(PDOException $e){
                print('<span class="error">Not working &#128557</span>');
                print('<span>Error message</span>');
                print('<pre class="error">' . $e->getMessage() . '</pre>');
            }
        ?>
  <div style="height: 100%">
    <div class="container-fluid" style="height: 100%; overflow: hidden">
      <div class="background"></div>
      <div class="row">
        <div class="col-12 text-right hover-underline pad-top">
        </div>
      </div>
      <div class="row center" style="width: 100%">
        <div class="col-12 text-white text-center">
          <a class="scaling-font" style="overflow:hidden"><lol!></a>

        </div>

      </div>
    </div>

  </div>
</body>
<footer>
 <div class="footerlogo">
  <img src="image/Unbenannt-3-[Wiederhergestellt].png" style="width:170px;height:110px;float:left;">
</div>
  <div class="Datenschutz">
   <a href="dataprotection.html"> <p style="font-size:15px;">Data Protection</p></a>
  </div class="Datenschutz">
  <div class="AGB">
  <a href="AGB.html"><p style="font-size:15px;"> AGB</p> </a>
  </div class="AGB">
  <div class="Impressum">
  <a href="imprint.html"><p style="font-size:15px;">Imprint</p> </a>
  </div class="Impressum">
  <div class="Account">
    <a href="login.php"><p style="font-size:15px;">My Account</p> </a>
  </div class="Account">
  <div class="Warenkorb">
  <a href="mycard.html"><p style="font-size:15px;">My Cart</p> </a>
  </div class="Warenkorb">
  <div class="AboutUs">
  <a href="aboutus.html"> <p style="font-size:15px;">About Us</p> </a>
  </div class="AboutUs">
  <div class="Help">
   <a href="help.html"> <p style="font-size:15px;">Need Help?</p> </a>
  </div class="Help">
  
  




	
</footer>
</html>
