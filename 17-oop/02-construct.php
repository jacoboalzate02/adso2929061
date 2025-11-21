
<?php
$title       = '02- Construct';
$description = 'Special method that initializes a new object upon creation.';

include 'template/header.php';

echo "<section>";

class Playlist
{
    public $name;
    public $artist = array();
    public $genre = array();
    public $image = array();
    public $year = array();

    public function __construct($name) {
        $this->name = $name;
    }
    
    public function setPlayList($artist, $genre, $image, $year) {
        $this->artist[] = $artist;
        $this->genre[] = $genre;
        $this->image[] = $image;
        $this->year[] = $year;
    }
    
    public function getPlayList() {
            echo "<h3> PlayList: $this->name </h3>";
            echo "<div style='display: flex; gap: 2rem; flex-direction: column'>";
                    for($i = 0; $i < count($this->artist); $i++) {
                        echo "<div style='display: flex; gap: 1rem'>";
                            echo "<img src='".$this->image[$i]."' width='120px'>";
                            echo "<div>";
                                echo "<h4> Artist: ".$this->artist[$i]."</h4>";
                                echo "<h5> Genre: ".$this->genre[$i]."</h5>";
                                echo "<h5> Year: ".$this->year[$i]."</h5>";
                            echo "</div>";
                        echo "</div>";
                    }
             echo   "</div>";
        }
}

$pl = new Playlist('Merry Christmas');
$pl->setPlayList('Mariah Carey', 'Pop-Holiday', 'https://i.scdn.co/image/ab67616d0000b2739fd9b1e2e9fc3521797b3689', 1994 );
$pl->setPlayList('Los Extraditablessd', 'Trap', 'https://shorturl.at/KEzY4', 2025 );
$pl->setPlaylist('Lamine Yamal', 'lamine Yamal', 'https://i.ytimg.com/vi/vHeO-9G5rxo/mqdefault.jpg', 'Lamine Yamal' );
$pl->getPlayList();
include 'template/footer.php';
