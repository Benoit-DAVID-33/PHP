<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
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
            $id = $_GET['id'] ?? 0;
            
            // if (isset($_GET['id'])){
            //     $id = $_GET['id'];
            // }else{
            //     $id = 0;
            // }
            
            
            $SQLQuery = "
            SELECT  nom, prenom, TIMESTAMPDIFF(YEAR, date_naissance, CURRENT_TIMESTAMP) as age, libelle_court, 
            CONCAT_WS(' ', numero_rue, nom_rue, COALESCE(complement_adresse, '')) as adresse,
            CONCAT_WS(' ', codepostal, ville) as ville
            FROM personne INNER JOIN civilite ON id_civilite = civilite.id
                INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
            WHERE personne.id = ".$id;
            
            $SQLResult = $conn->query($SQLQuery);
            
            // Etape 3 : Exploitation des résulats 
            if ($SQLResult->rowCount() == 0){
                print("Personne ne repond !!");
                die();
            }
            
            $unePersonne = $SQLResult->fetch(PDO::FETCH_ASSOC);
            
            // Etape 4 : Libération des ressources
            $SQLResult->closeCursor();
    ?>
    <div>
        <label for="">Civilité :</label>
        <?= $unePersonne['libelle_court'] ?>
    </div>
    <div>
        <label for="">Nom :</label>
        <?= $unePersonne['nom'] ?>
    </div>
    <div>
        <label for="">Prénom :</label>
        <?= $unePersonne['prenom'] ?>
    </div>
    <div>
        <label for="">Age :</label>
        <?= $unePersonne['age'] ?>
    </div>
    <div>
        <label for="">Adresse :</label>
        <?= $unePersonne['adresse'] ?><br>
        <?= $unePersonne['ville'] ?>
    </div>
</body>
</html>