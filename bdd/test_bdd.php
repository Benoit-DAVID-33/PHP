<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        // Etape 1 : la connexion
        $server = 'db.3wa.io';
        $port = '3306';
        $dbname = 'benoitdavid_mycontacts';
        $username = 'benoitdavid';
        $password = '30dfb694ac16b17e016ad25722364270';

        // Construction de la chaine de connexion : Date Source Name
        $dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";
        
        try{
            $conn = new PDO($dsn, $username, $password);
        }catch(PDOException $ex){
            print('Pas possible de se connecter !!!');
            die("Au revoir !!!");
        }
        // Etape 2 : Exécution de la requête
        print('Je suis bien connecté !!!');
        $SQLResult = $conn->query("SELECT * FROM personne");
        
        // Etape 3 : Exploitation des résulats 
        print('<pre>');
        print_r($SQLResult->fetchAll(PDO::FETCH_ASSOC));
        print('</pre>');
        
        // Etape 4 : Libération des ressources
        $SQLResult->closeCursor();
    ?>
</body>
</html>