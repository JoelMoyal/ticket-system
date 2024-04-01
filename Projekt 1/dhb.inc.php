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