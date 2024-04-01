<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    
    try {
        $conStr = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            "db",
            "5432",
            "prj1",
            "prj1_user",
            "prj1_password"
        );
        $db = new PDO($conStr);

    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
    
    ?>
</head>
<body>
    
</body>
</html>