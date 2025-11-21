
<?php 
    $title       = '03- Private';
    $description = 'Restricts property or method access to only within its class.';

    include 'template/header.php';

    echo "<section>";

    class RenderTable {
        private $nr; // Number of Rows
        private $nc; // Number of Columns

        public function __construct($nr, $nc) {
          $this->nr = $nr;
          $this->nc = $nc;
          
          // Access methods private
          $this->renderTableHeader();
          $this->renderTableBody();
          $this->renderTableFooter();
        }

        private function renderTableHeader() {
            echo "<table>";
        }
        private function renderTableBody() {
            for ($r=1; $r <= $this->nr ; $r++) { 
                echo "<tr>";
                for ($c=1; $c <= $this->nc ; $c++) { 
                    echo "<td>f$r c$c</td>";
                }

                echo "</tr>";
            }
        }

        private function renderTableFooter() {
            echo "</table>";
        }
    }
    $rt = new RenderTable(5, 5);
    echo "<br>";
    $rt = new RenderTable(3, 3);
    include 'template/footer.php';
