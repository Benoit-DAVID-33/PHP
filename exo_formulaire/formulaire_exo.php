<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="traitement_form.php" method="post" >
        <input type="number" id="number1" name="a" min="0" required/>
        <input type="number" id="number2" name="b" min="0" required/>
        <br>
        <input type="submit" name="action" value="Calculez"/>
    </form>
    <form action="traitement_form2.php" method="post">
        <?php
                echo '<br><select number name="num1">',"\n";
                for($i=0; $i<=9; $i++){
                echo "<option>$i</option>";
            }
            echo '<select>';
        ?>
      
        <input type="submit" name="action" value="Submit"/>
    </form>
    <form  >
        <?php
            $peoples = array(
                array("nom" => "Hugon", "prenom" => "Mauranne", "age" => "30 ans"),
                array("nom" => "LIMLAHI", "prenom" => "fawsy", "age" => "29 ans"),
                array("nom" => "Altaber", "prenom" => "Thibault", "age" => "30 ans"),
                array("nom" => "Guinard", "prenom" => "Julia", "age" => "35 ans"),
                array("nom" => "Parking", "prenom" => "Joanna", "age" => "38 ans"),
                array("nom" => "KATE", "prenom" => "Anissa", "age" => "42 ans"),
                array("nom" => "Sable", "prenom" => "Sandy", "age" => "22 ans"),
                array("nom" => "Giroud", "prenom" => "Yoan", "age" => "34 ans"),
                array("nom" => "DAVID", "prenom" => "Benoît", "age" => "44 ans"),
                array("nom" => "Loorius", "prenom" => "olivier", "age" => "36 ans"),
);


    sort($peoples);
                echo "<select name='people' onchange='alert(this.value)'>" . PHP_EOL ;
 
                echo "<option>Tout le monde</option>" . PHP_EOL ;
    
                    foreach( $peoples as $people ) {
                echo '<option>'.$people['nom'].' '.$people['prenom'].' '.$people['age'].'</option>' . PHP_EOL ;
          }
                echo "</select >" . PHP_EOL ;
     ?>
     <input type="submit" name="action2" value="Submit"/>
    </form>
    <form action="traitement_form_michel.php" method="post">
        <select name="cbListePersonnes" id="chCbListePersonnes">
			<option value="tous">Tout le monde</option>
		    <?php
			    // inclusion d'un fichier externe 
			    // require('nom fichier') | include('nom fichier')
			    // require_once('nom fichier') | include_once('nom fichier')
			    require('datas_michel2.php');
			
			    foreach ($apprenants as $indice => $nomApprenant){
				    $infos = $nomApprenant['nom'].' '.$nomApprenant['prenom'];
				    print('<option value='.$indice.'>'.$infos.'</option>'); 
			    }
		    ?>
		</select>
		<button type="submit">Valider</button>
	</form>
	
	
	<form action="traitement_form5.php" method="post">
	    <p>Bouton 1</p>
	    <input type="radio" name="btn1" id="btn1" value="C"/>
	    <label for="btn1">Tri alphabétique croissant</label>
	    <input type="radio" name="btn1" id="btn1"value="D"/>
        <label for="btn1">alphabétique décroissant</label>		
        
        <p>Bouton 2</p>
	    <input type="radio" name="btn2" id="btn2" value="P"/>
	    <label for="btn2">les noms de longueur paire </label>
	    <input type="radio" name="btn2" id="btn2" value="I"/>
        <label for="btn2">les noms de longueur impaire</label>	
	</form>
   
    
</body>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        document.querySelector('#chCbListePersonnes').addEventListener('change', function(){
            // This fait référence ) l'élément qui a déclenché l'événement
                if(this.value == 'tous'){
                    document.querySelectorAll('[type=radio]').forEach(function(bouton){
                        bouton.removeAttribute('disabled');
                    })
                    
                }else{
                    document.querySelectorAll('[type=radio]').forEach(function(bouton){
                        bouton.setAttribute('disabled', 'disabled');
                    })
                }
        })
    })
</script>
</html>