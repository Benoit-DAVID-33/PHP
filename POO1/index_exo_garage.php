<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    

    <?php
        require_once "Moto.php";
        require_once "Camion.php";
        require_once "Tank.php";
        require_once "Vehicule.php";
            // $moto1 = new Moto('Rouge', 'Super', 'BMW', 'XSR', 2, 150000, );
            // $moto1->sedeplacer();
            // print('<br>');
        
            // $voiture1 = new Voiture('Gazoil', 125, 206, 'Golf', 'Volkswagen', 'Grise', 4, 256254);
            // $voiture1->sedeplacer();
            // print('<br>');
            
            // $camion1 = new Camion('Gazoil', 35, 184, '154TYPL', 'Scana', 'Rouge', 6, 1258745);
            // $camion1->sedeplacer();
            // print('<br>');
            
            // $tank1 = new Tank('Gazoil', 75, 115, 'MTRLC129', 'Leclerc', 'Vert', 0, 87540);
            // $tank1->sedeplacer();
            // print('<br>');
            
            
            $vehicule1 = new Vehicule('Gris', 'Apache', '154rotor255', 4);
            $vehicule1->seDeplacer();
            print('<br>');
    ?>
    
    
    </body>
</html>