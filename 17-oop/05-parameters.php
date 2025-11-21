
<?php 
    $title       = '05- Parameters';
    $description = 'Values passed into a method to customize its operation.';

    include 'template/header.php';

    echo "<section>";

    class Country {
        public $name;

        public function __construct($name) {
            $this->name = $name;
        }
    }
    class FifaWorldCup {
        private $country;
        private $year;
        private $winner;
        # Country & Year are mandatory
        # Winner is optional
        public function __construct($country, $year, $winner = "Brazil") {
            $this->country = $country;
            $this->year = $year;
            $this->winner = $winner;
        }
        public function showEvent() {
            echo "<ul>
                      <li>
                            <b>Country:</b> {$this->country->name}
                            <b>Year:</b> {$this->year}
                            <b>Winner:</b> {$this->winner}
                        </li>
                    </ul>";
        }
    }

    $country = new Country('Italy');
    $worlcup = new FifaWorldCup($country, 1990, 'Germany');
    $worlcup->showEvent();
    
    $country = new Country('USA');
    $worlcup = new FifaWorldCup($country, 1994);
    $worlcup->showEvent();
    
    $country = new Country('France');
    $worlcup = new FifaWorldCup($country, 1998, 'France');
    $worlcup->showEvent();
    include 'template/footer.php';
