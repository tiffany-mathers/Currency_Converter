<!doctype html>
<html lan="en">
<head>
    <meta charset="UTF-8">
    <title>Microblogging Site</title>
</head>
<body>

    <?php 
    require '../app/models/DAO.php';
    
    $DAO = new DAO();

    // $connect is a boolean true = connected, false = error connecting
    $testConnect = $DAO->testConnection();
    
    if ($testConnect == true) {
        echo "connection made";
    } if ($testConnect == false) {
        echo "connection failed";
    }
 
    $conn = $DAO->connect();
    $initCurr="euro";
    $desExRate="dollarEx";
    echo $DAO->getSuccess($initCurr, $desExRate, $conn);
    echo $DAO->getExRate($initCurr, $desExRate, $conn);
    
    echo("<br>Hello World"); 
    

    ?>
</body>

</html>