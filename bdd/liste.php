<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des personnes</title>
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
            $SQLResult = $conn->query("
            SELECT personne.id, nom, prenom, date_naissance, libelle_court, CONCAT_WS(' ', codepostal, ville) as ville
            FROM personne INNER JOIN civilite ON id_civilite = civilite.id
                INNER JOIN cp_ville ON id_cp_ville = cp_ville.id
            
            ORDER BY nom DESC");
            
            // Etape 3 : Exploitation des résulats 
            $mesPersonnes = $SQLResult->fetchAll(PDO::FETCH_ASSOC);
            
            // Etape 4 : Libération des ressources
            $SQLResult->closeCursor();
    ?>
    <table>
        <thead>
            <tr>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>code postal - ville</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                foreach ($mesPersonnes as $unePersonne){
                    // Si je le fais en PHP
                    $formatDate = date_create($unePersonne['date_naissance']);
                    $dateFr = date_format($formatDate, 'd/m/y');
                    print('<tr>');
                    print('<td>'.$unePersonne['libelle_court'].'</td>');
                    print('<td><a href="visu.php?id='.$unePersonne['id'].'">'.$unePersonne['nom']. '</a></td>');
                    print('<td>'.$unePersonne['prenom'].'</td>');
                    print('<td>'.$dateFr.'</td>');
                    print('<td>'.$unePersonne['ville'].'</td>');
                    print('</tr>');
                }
            
            ?>
            
        </tbody>
    </table>
    
</body>
</html>

<!-- 
    Petit excercice pour finir la journée :-)
    
    Créez un fichier "visu.php" qui permettre d'afficher les informations
    d'un contact sous la forme d'une fiche par exemple :
        
        Civilite : ....
        Nom : ....
        Prénom : ....
        Age : ....
        Adresse complète : ....
        
            ...
            ...
            .... ....
            
    Petite dufficulé : 
        Trouvez le moyen de faire en sorte que le tableau que nous avons crée auparavant
        dispose, pour chaque personne listée, d'un lien amenant sur le fichier visu.php
        permettant ainsi de n'afficher que lesinformations de la personne choisie

-->