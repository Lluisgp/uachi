<?php
//stream it
if (isset($_GET['stream'])) {
    include "./lib/streamer.php";
    stream('./videos/' . basename($_GET['stream']), 'video/mp4');
}
?>