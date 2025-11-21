
<?php 
    $title       = '06- Extends';
    $description = 'Keyword for a class to inherit properties and methods from another.';

    include 'template/header.php';

    echo "<section>";

    class Operation {
        protected $num1;
        protected $num2;

        public function __construct($num1, $num2) {
            $this->num1 = $num1;
            $this->num2 = $num2;
        }
    }

    class Addition extends Operation {
        public function showResults() {
            $result = $this->num1 + $this->num2;
            return "<ul><li>{$this->num1} + {$this->num2} = {$result}</li><ul/>";
        }
    }

    class Substraction extends Operation {
        public function showResults() {
            $result = $this->num1 - $this->num2;
            return "<ul><li>{$this->num1} - {$this->num2} = {$result}</li><ul/>";
        }
    }

    class Product extends Operation {
        public function showResults() {
            $result = $this->num1 * $this->num2;
            return "<ul><li>{$this->num1} * {$this->num2} = {$result}</li><ul/>";
        }
    }
    
    class Division extends Operation {
        public function showResults() {
            $result = $this->num1 / $this->num2;
            return "<ul><li>{$this->num1} / {$this->num2} = {$result}</li><ul/>";
        }
    }
    $op1 = new Addition(16, 32);
    echo $op1->showResults();
    
    $op2 = new Substraction(16, 32);
    echo $op2->showResults();
    
    $op3 = new Product(16, 32);
    echo $op3->showResults();
    
    $op4 = new Division(16, 32);
    echo $op4->showResults();
    
    
    
    include 'template/footer.php';
