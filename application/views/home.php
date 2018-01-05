<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Uachit</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery-3.2.1.js"></script> 
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
        </style>
    </head>
    <body>
        <?php $this->view('header'); ?>           
        <div class="container-fluid">
            <div class="flex-row row">
                <?php
                if ($data) {
                    foreach ($data as $fila) {
                        echo "<div class='card' style='width: 25rem;margin-left: 20px; margin-bottom: 20px;'>";
                        echo "<a href='";
                        echo base_url('media/media_show');
                        echo "?media_id=";
                        echo $fila['media_id'];
                        echo "'target='_blank' /a>";
                        if ($fila['thumbnail']){
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($fila['thumbnail']) . '"/>';
                        } else {
                        echo '<img class="card-img-top" src = "';
                        echo base_url(); 
                        echo 'img/proximamente.png"/>';    
                        }
                        echo "<div class='card-block'>";
                        echo "<h4 class='card-title'>";
                        echo $fila['media_title'];
                        echo "</h4>";
                        echo "<p class='card-text'>";
                        echo $fila['media_description'];
                        echo "</p>";
                        echo "</div>";
                        echo "<ul class='list-group list-group-flush'>";
                        echo "<li class='list-group-item'>";
                        echo $fila['media_tags'];
                        echo "</li>";
                        echo "</ul>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>