<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?PHP
        require('couleurs.php');
    ?>
    <h2>Je suis une moto</h2>
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
    <p><?php jemedeplace(); ?></p>
</body>
</html>