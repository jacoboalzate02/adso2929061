
<?php 
    $title       = '09- Class Abstract';
    $description = 'A class that cannot be instantiated, only extended from.';

    include 'template/header.php';

    echo "<section>";

    abstract class HumanBeing {

    }
    
    $hb = new HumanBeing; 
    include 'template/footer.php';
