
<?php
$title       = '07- Overwrite ';
$description = 'Redefining a parent class method in the child class.';

include 'template/header.php';

echo "<section>";

class VideoGame
{
    protected $name;
    protected $platform;

    public function __construct($name, $platform)
    {
        $this->name = $name;
        $this->platform = $platform;
    }
    public function showVideoGame()
    {
        return "<ul><li> Platform: {$this->platform} </li></ul>";
    }
}
class GameConsole extends VideoGame
{
    public function showVideoGame()
    {
        echo "<ul><li> Name: {$this->name} <br>";
        parent::showVideoGame();
    }
}

$gm = new GameConsole('Hollow Knight: Silk Song', 'Nintendo Switch');
$gm->showVideoGame();

$gm = new GameConsole('FC26', 'Multiplatform');
$gm->showVideoGame();

$gm = new GameConsole('Call of duty', 'Play Station 5');
$gm->showVideoGame();

$gm = new GameConsole('Red Dead Redemption 2', 'Xbox Series X');
$gm->showVideoGame();

$gm = new GameConsole('Need For Speed', 'Nintendo Switch');
$gm->showVideoGame();



include 'template/footer.php';
