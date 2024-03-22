<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?PHP
        require('couleurs.php');
        require_once('roues.php'); // Je prévois que roues.php a déjà été inclus dans couleurs.php
    ?>
    <h2>Je suis une voiture</h2>
    <div>
        mes couleurs possible sont : 
        <select>
            <?php
                foreach ($couleurs as $couleur){
                    print('<option value="'.$couleur.'">'.$couleur.'</option>');
                }
            ?>
        </select>
    </div>
    <div>
        Je peux avoir :
        <select>
            <?php
                foreach ($roues as $roue){
                    print('<option value="">'.$roue.'</option>');     
                }
            ?>
        </select>
    </div>    
</body>
</html>