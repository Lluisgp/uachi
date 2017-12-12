<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Uachit</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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
        <div class="container-fluid"></br>
            <div class="row">
                <div class="col-sm-8">    
                    <form role="form" class="form-inline" method="post" action="<?php echo base_url('media/media_search'); ?>"> <p>&nbsp;&nbsp;</p> 
                        <svg class="form-group" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="40.000000pt" height="40.000000pt" viewBox="0 0 50.000000 50.000000"
                             preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)"
                           fill="#ff0000" stroke="none">
                        <path d="M167 486 c-55 -21 -103 -61 -134 -114 -24 -40 -28 -58 -28 -123 0
                              -67 4 -81 30 -125 99 -159 326 -164 425 -8 101 160 -4 368 -192 380 -39 3 -77
                              -1 -101 -10z m22 -189 c-31 -65 -37 -115 -17 -135 36 -36 98 16 123 104 15 53
                              36 84 56 84 5 0 1 -19 -7 -42 -9 -24 -16 -70 -17 -103 -2 -56 -1 -60 20 -59
                              18 0 20 -2 12 -13 -24 -28 -69 -8 -69 30 0 17 -3 16 -31 -7 -38 -32 -71 -41
                              -98 -27 -32 18 -36 57 -14 133 20 66 20 68 2 68 -11 0 -19 2 -19 4 0 2 -2 10
                              -5 18 -4 10 6 12 44 10 l49 -4 -29 -61z"/>
                        </g>
                        </svg><p>&nbsp;&nbsp;</p> 
                        <input type="text" class="center-block form-control input-lg cercar" title="Cercar" name="cerca" placeholder="Introdueïx el que vols cercar..."/>
                        <p>&nbsp;&nbsp;</p> 
                        <input class="btn btn-primary" type="submit" value="Cerca" name="Cercabt"/></form>
                </div> 
                <div class="col-sm-4"style="text-align:right">
                    <p>login</p>
                </div>
            </div>     
            </br>
        </div>            
        <div class="container-fluid">
            <div class="flex-row row">
                <?php
                if ($data) {
                    foreach ($data as $fila) {
                        echo "<div class='card' style='width: 20rem;margin-left: 20px; margin-bottom: 20px;'>";
                        echo "<a href='";
                        echo $fila['media_address'];
                        echo "'target='_blank' /a>";
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($fila['thumbnail']) . '"/>';
                        echo "<div class='card-block'>";
                        echo "<h4 class='card-title'>";
                        echo $fila['media_title_es'];
                        echo "</h4>";
                        echo "<p class='card-text'>";
                        echo $fila['media_description_es'];
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