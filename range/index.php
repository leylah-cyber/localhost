<?php 
// filepath: ./range/index.php
$localhost = $_SERVER['REQUEST_URI'];

class Playlist {
    private $songs = [];
    private $index = 0;

    public function __construct($songs, $index) {
        $this->songs = $songs;
        $this->index = $index;
    }
    // public function addSong($song) {
    //     $this->songs[] = $song;
    // }
    
    public function getCurrentSong() {
        
        if (isset($this->songs[$this->index])) {
            return $this->songs[$this->index];
        }
        return null;
    }
    
}

//$presents = new Playlist(false,0);
$playline = 4;

switch ($localhost) {
    case '/phpinfo':
        // phpinfo();
        break;
    case '/contact':
        echo "GEOINT REF:9283";
        break;
    case "/playlist":
        $fplaylist = fopen("./points/playlist","r");
        if ($fplaylist) {
            while (!feof($fplaylist)) {
                while (($line = fgets($fplaylist)) !== false ) {
                
                    if (preg_match("/.*/", $line, $matches)) {
                        $playlist = $matches[0];
                        
                        $presents = new Playlist(explode("\n", trim(file_get_contents("./points/playlist"))), $playline);
                        
                    }                      

                }    
            }
        }
        
        if($presents !== false) {
            echo "Now Playing: ".$presents->getCurrentSong()."";
        } else {
            echo "No song is currently playing.";
        }
                
        break;
    case "/playlist-next":
        $playline++;
        break;
    case "/playlist-prev":
        $playline--;
        break;
    case "/playlist-reset":
        $playline = 0;
        break;
    case "/presents":
        break;
    default:
        echo "Home page";
        break;
}

?>

