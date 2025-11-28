
<?php
$title       = '09- Class Abstract';
$description = 'A class that cannot be instantiated, only extended from.';

include 'template/header.php';

echo "<section>";

abstract class ConexionDB
{

    private $host;
    private $bd;
    private $usuario;
    private $clave;

    protected $db;

    public function __construct(
        $host = 'localhost',
        $bd = 'pokeadso',
        $usuario = 'root',
        $clave = ''
    ) {
        $this->host    = $host;
        $this->bd      = $bd;
        $this->usuario = $usuario;
        $this->clave   = $clave;

        $this->abrirConexion();
    }

    protected function abrirConexion()
    {
        $cadena = "mysql:host={$this->host};dbname={$this->bd};charset=utf8";

        try {
            $this->db = new PDO($cadena, $this->usuario, $this->clave);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("🔴 No se pudo conectar: " . $err->getMessage());
        }
    }

    protected function cerrarConexion()
    {
        $this->db = null;
    }

    
    public function consultar() {}
}

class CatalogoPokemon extends ConexionDB
{

    public function obtenerTabla()
    {

        $this->abrirConexion();

        try {
            $peticion = "SELECT id, name AS nombre, tipo FROM pokemons ORDER BY id";
            $resultado = $this->db->query($peticion);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $html  = "<table border='1' cellpadding='6'>";
            $html .= "<tr>
                        <th>Código</th>
                        <th>Pokémon</th>
                        <th>Elemento</th>
                      </tr>";

            foreach ($lista as $fila) {
                $html .= "<tr>
                            <td>{$fila['id']}</td>
                            <td>{$fila['nombre']}</td>
                            <td>{$fila['tipo']}</td>
                          </tr>";
            }

            $html .= "</table>";

            return $html;
        } catch (PDOException $e) {
            return "<p>Error al consultar los pokemones.</p>";
        } finally {
            $this->cerrarConexion();
        }
    }
}

$pokemones = new CatalogoPokemon();
echo $pokemones->obtenerTabla();

include_once 'template/footer.php';
