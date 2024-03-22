<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?PHP
        require('roues.php');
    ?>
    <h2>Je suis une skate</h2>
    <div>
        j'ai pas de couleur possible  
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