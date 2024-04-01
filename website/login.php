<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
require('dbconnect.php');
?>
<head>

<body>
    <?php
    if(isset($_POST["submit"])){
        $stmt = $conn->prepare("SELECT * FROM KÄUFER WHERE email =:user"); 
        $stmt->bindParam(":user", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){ 
            $row = $stmt->fetch();
            if(password_verify($_POST["pw"], $row["passwort"])){
                session_start();
                $_SESSION["email"] = $row["email"];
                header("Location: index.html"); //Verknüpfung für positiven Login

            }else{
                echo"Login failed";
            }
           
            


        }else{
            echo "Login failed";
        }

    }
    ?>
    
    <h1>Login</h1>
    <form action="register.php" method="post">
    <input type="text" name="Email" placeholder="Email" required><br>
    <input type="Password" name="pw" placeholder="Password" required><br>
    <button type="submit" name="submit">Login</button>
    

    </form>
    <br>
    <a href="createaccount.php">No Account?</a>

</body>
<footer>


</html>