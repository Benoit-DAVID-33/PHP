<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="traitement_form.php" method="post">
		<!-- Exos 1 & 2
			<input type="number" name="chNumber1" id="chN1" required min="0">
			<input type="number" name="chNumber2" id="chN2" required min="0">
		-->

		<!-- Exo 3
			<select name="cbValues" id="chCbValues">
				<?php
					$script = '';
					for ($i = 0; $i <= 9; $i++){
						$script .= '<option value="'.$i.'">'.$i.'</option>';
					}
					print($script);
				?>
			</select>
		-->

		<!-- Exo 5 -->
		<select name="cbListePersonnes" id="chCbListePersonnes">
			<option value="tous">Tout le monde</option>
		<?php
			// inclusion d'un fichier externe 
			// require('nom fichier') | include('nom fichier')
			// require_once('nom fichier') | include_once('nom fichier')
			require('datas.php');
			
			foreach ($apprenants as $indice => $nomApprenant){
				$infos = $nomApprenant['nom'].' '.$nomApprenant['prenom'];
				print('<option value='.$indice.'>'.$infos.'</option>'); 
			}

		?>
		</select>
		<button type="submit">Valider</button>
	</form>
</body>
</html>