<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Uachit</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-3.2.1.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
        <style>
            a:hover, a:visited, a:link, a:active
            {
                color: black;
                text-decoration: none;
            }  
            .cercar{
                width: 50% !important;
            }
            body {
                background-color: black;
            }
        </style>
    </head>
    <body>
        <?php $this->view('header'); ?>         
        <div class="container-fluid">

            <?php
            if ($data) {
                echo '<div class="flex-row row">';
                echo '<h1 style="color:white; margin: auto;">';
                echo $data['media_title'];
                echo '</h1>';
                echo '</div>';
                echo '<div class="flex-row row">';
                echo '<video style="margin: auto;padding-top: 20px;" width="640" height="480" controls autoplay>';
//                echo '<source type="video/mp4" src="data:video/mp4;base64,' . base64_encode($data['videodata']) . '"/>';
//                echo '<source type="video/mp4" src="data:video/mp4,';
                echo '<source type="video/mp4" src="';
                echo base_url();
                echo 'videos/';
                echo $data['media_id'];
                echo '.mp4"';
                echo '</video>';
                echo '</div>';
                echo '<div class="flex-row row">';
                echo '<h3 style="color:white; margin: auto; padding-top: 20px;">';
                echo $data['media_description'];
                echo '</h3>';
                echo '</div>';
            }
            ?>

        </div>
    </body>
</html>