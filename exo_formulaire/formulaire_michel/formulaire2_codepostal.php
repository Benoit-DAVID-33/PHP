<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        $action = $_GET['action'] ?? 'add';
        $id = $_GET['id'] ?? 0;
    
        $idCodePostalPersonne = 0;
    
    	require_once('bdd.php');

	    $SQLQueryCpv = "SELECT codepostal FROM cp_ville LIMIT 100";

		$SQLResultCpv = $conn->query($SQLQueryCpv);
		$lescodespostaux = $SQLResultCpv->fetchAll(PDO::FETCH_ASSOC);
		$SQLResultCpv->closeCursor();
		
// 		$SQLQueryCpv = "SELECT id, codepostal, ville FROM cp_ville LIMIT 100";

// 		$SQLResultCpv = $conn->query($SQLQueryCpv);
// 		$lesVilles = $SQLResultCpv->fetchAll(PDO::FETCH_ASSOC);
// 		$SQLResultCpv->closeCursor();
//     
//        <select name="cbCpville" id="cbCpville">
// 					<option value="0">--Sélectionner--</option>
// 					
// 						foreach ($lesVilles as $uneVille){
// 							$idCpville = $uneVille['id'];
// 							$codePostal = $uneVille['codepostal'];
// 							$ville = $uneVille['ville'];

// 							if ($idCpville == $idCodePostalPersonne){
// 								print('<option value="'.$idCpville.'" selected>'.$codePostal.' '.$ville.'</option>');
// 							}else{
// 								print('<option value="'.$idCpville.'">'.$codePostal.' '.$ville.'</option>');
// 							}
// 						}
// 					?>
    </select>
    <form method="post" action="traitement2_codepostal.php?action=<?=$action?>&id=<?=$id?>"> 
	    <input type="number" name="" placeholder="codepostal"/>
	    <input type="submit" name=""/>
	    <div>
	        <label for="chCodepostal">Code Postal :</label>
	        <input type="text" name="chCodepostal" id="chCodepostal" maxlength="5" value="" required/>
	    </div>
	    <div>
	        <label for="chVille">Ville :</label>
	        <input type="text" name="chVille" value="" id="chVille" required/>
	    </div>
	    <div>
	        <button type="submit">Valider</button>
	        <button type="reset">Réinitialiser</button>
	    </div>
	</form>
	
</body>
</html>