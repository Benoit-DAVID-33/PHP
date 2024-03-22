<?php
    echo 'Coucou je suis là';
    
    print('<pre>');
    print_r($_REQUEST); 
    print('<pre>');

    
    /*if ($_POST['action'] == "submit"){*/
	    $a = $_POST['a'];
	    $b = $_POST['b'];
	   
	    
	    if ($a + $b == 0 || $a - $b == 0 || $a * $b == 0 || $a / $b == 0){
	        echo 'calcul impossible';
	    }else {
	         echo 'number1 + number2 = ' .($a + $b); 
	   
	    echo '<br>number1 - number2 = ' .($a - $b); 
	    
	    echo '<br>number1 * number2 = ' .($a * $b); 
	    
	    echo '<br>number1 / number2 = ' .($a / $b); 
	    }
	    
	    
        // echo '<br><select number">',"\n";
        //     for($i=0; $i<=9; $i++){
        //         echo "<option>$i</option>";
        //     }
        // echo '<select>';
                                            