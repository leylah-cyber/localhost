<?php 
// filepath: ./range/index.php
$localhost = $_SERVER['REQUEST_URI'];
header('ACCESS-CONTROL-ALLOW-ORIGIN: *');
header('ACCESS-CONTROL-ALLOW-METHODS: GET');
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
        exit();
    case '/contact':
        echo "GEOINT REF:9283";
        exit();
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
            header('Location: '.$presents->getCurrentSong());
            
        } else {
            header('Location: https://www.youtube.com/watch?v=gdFo3dyhlQM');
            
        }
        exit();
    case "/playlist-next":
        $playline++;
        exit();
    case "/playlist-prev":
        $playline--;
        exit();
    case "/playlist-reset":
        $playline = 0;
        exit();
    case "/presents":
        
        //$fplaylist = fopen("./points/playlist","r");
        //if ($fplaylist) {
        //    while (!feof($fplaylist)) {
        //        while (($line = fgets($fplaylist)) !== false ) {
                
        //            if (preg_match("/.*/", $line, $matches)) {
        //                $playlist = $matches[0];
                        
        //                $presents = new Playlist(explode("\n", trim(file_get_contents("./points/playlist"))), $playline);
                        
        //            }                      

        //        }    
        //    }
        //}
        
        //if($presents !== false) {
            //echo "".$presents->getCurrentSong()."";
            //TODO: SSL/TLS cert; Referrer Policy added to iframe for security reasons
        //    echo "<iframe width='582' height='336' src='".$presents->getCurrentSong()."'  frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>";
        //} else {
        //    echo "<iframe width='582' height='336' src='https://www.youtube.com/watch?v=gdFo3dyhlQM' title='𝟭𝟵𝟵𝟵 𝗛𝗜𝗝𝗔𝗖𝗞𝗘𝗗 𝗗𝗥𝗘𝗔𝗠𝗦 | Synthwave, Vaporwave, Cyberpunk, Chillwave, Retrowave, Funkwave Playlist' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='noreferrer' allowfullscreen></iframe>";
        //}
                
        
        exit();
    default:
        echo "Home page";
        exit()
}

?>

