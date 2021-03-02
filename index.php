<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo complet lecture SQL.</title>
</head>
<body>

<?php

    try {
        $user = 'root';

        $pdo = new PDO("mysql:host=localhost;dbname=table_test_php;charset=utf8", 'root' , '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


        $nomDoe = $pdo->prepare("SELECT * from table_test_php.clients ");
        $state = $nomDoe->execute();
        if ($state){
            foreach ($nomDoe->fetchAll() as $user){
                echo "client: ".$user['lastName']." ".$user['firstName']." -> ".$user['cardNumber'].'<br>';
            }
        }
        echo '<hr>';

        $nomDoe = $pdo->prepare("SELECT * from table_test_php.showtypes ");
        $state = $nomDoe->execute();
        if ($state){
            foreach ($nomDoe->fetchAll() as $user){
                echo "client: ".$user['type'].'<br>';
            }
        }
        echo '<hr>';

        $nomDoe = $pdo->prepare("SELECT * from table_test_php.clients LIMIT 20");
        $state = $nomDoe->execute();
        if ($state){
            foreach ($nomDoe->fetchAll() as $user){
                echo "id: ".$user['id'].' '.$user['lastName']." ". $user['firstName'].'<br>';
            }
        }
        echo '<hr>';

    }
    catch (PDOException $exception) {
        echo $exception->getMessage();
    }

?>

</body>
</html>
