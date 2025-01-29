<?php
    include("connected.php");

    $cnx = new PDO("mysql:host=localhost;dbname=tp_php","VitoDeriu","askiponfaitdesbdd");

    $rqt = 'SELECT * FROM users;'; 
    $stmt = $cnx->prepare($rqt);
    $stmt->execute(); 
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php print_r($res); ?>
</body>
</html>