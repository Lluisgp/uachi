<?php
$user_id = $this->session->userdata('user_id');
$user_admin = $this->session->userdata('user_admin');

if (!$user_id || $user_admin != 1) {

    redirect('user/login_view');
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Administración</title>               
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-3.2.1.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">

        <!-- jquery datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/> 
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
        <!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/admin.js"></script>
    </head>
    <body>         
        <div class="container-fluid"></br>
            <div class="row">
                <div class="col-sm-8">    
                    <form role="form" class="form-inline" method="post" action="<?php echo base_url('media/media_search'); ?>"> <p>&nbsp;&nbsp;</p> 
                        <?php
                        echo "<a href='";
                        echo base_url();
                        echo "'>";
                        ?>
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
                        </svg>
                        <?php echo "</a>"; ?>
                        <p>&nbsp;&nbsp;</p>                         
                        <h3>Administración</h3></form>
                </div> 
                <div class="col-sm-4"style="text-align:right">
                    <?php
                    if ($this->session->userdata('user_id')) {
                        echo '<a class="text-muted" style="vertical-align: top;" href="';
                        echo base_url('user/user_profile');
                        echo '">';
                        echo $this->session->userdata('user_name');
                        echo '</a>';
                    } else {
                        echo '<a class="text-muted" style="vertical-align: top;" href="';
                        echo base_url('user');
                        echo '">Iniciar sesión</a>';
                    }
                    ?><a href="<?php echo base_url('user'); ?>">
                        <svg class="" version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="40.000000pt" height="40.000000pt" viewBox="0 0 512.000000 512.000000"

                             preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                           fill="#ff0000" stroke="none">
                        <path d="M2240 5064 c-58 -7 -150 -23 -205 -35 -55 -12 -109 -23 -120 -24 -11
                              -2 -28 -6 -39 -10 -10 -5 -26 -4 -35 1 -24 15 -55 6 -41 -11 9 -10 0 -17 -42
                              -30 -354 -117 -714 -340 -984 -609 -120 -121 -281 -320 -342 -425 -14 -25 -37
                              -62 -50 -81 -50 -75 -188 -379 -217 -480 -4 -14 -13 -34 -19 -45 -7 -11 -16
                              -38 -19 -60 -3 -22 -17 -89 -31 -149 -45 -193 -59 -354 -53 -606 5 -237 18
                              -349 63 -530 14 -58 26 -119 25 -137 0 -17 6 -33 13 -36 7 -3 17 -18 20 -34
                              14 -55 97 -252 150 -354 157 -305 343 -541 603 -766 51 -44 111 -93 135 -109
                              24 -16 51 -36 60 -44 26 -23 214 -134 313 -185 93 -47 278 -124 352 -146 23
                              -6 40 -15 38 -19 -3 -4 17 -10 43 -13 26 -3 97 -17 157 -31 328 -76 763 -76
                              1090 0 61 14 134 28 162 31 29 3 50 9 48 13 -3 5 19 16 47 26 138 45 445 186
                              498 229 8 6 36 23 61 38 101 58 303 219 425 341 267 267 493 632 609 984 12
                              39 20 51 28 43 6 -6 15 -11 19 -11 12 0 10 34 -4 48 -8 8 -8 15 2 26 7 9 10
                              22 7 30 -4 9 5 64 18 123 73 325 74 754 3 1072 -12 53 -21 107 -21 121 1 14
                              -3 31 -9 38 -7 8 -7 16 2 27 17 20 5 52 -14 36 -10 -9 -15 -2 -25 32 -37 123
                              -169 414 -235 517 -13 19 -38 59 -56 88 -18 30 -38 59 -44 65 -6 7 -24 31 -40
                              55 -36 53 -171 209 -240 278 -119 119 -326 284 -426 342 -25 14 -52 31 -60 38
                              -42 35 -450 224 -483 224 -3 0 -18 5 -32 10 -21 8 -25 13 -16 24 9 11 7 15 -8
                              19 -11 3 -25 -1 -32 -9 -9 -11 -15 -11 -33 -2 -11 7 -25 11 -29 10 -5 -2 -59
                              9 -120 22 -180 41 -340 56 -562 55 -110 -1 -247 -7 -305 -15z m486 -1305 c298
                              -53 550 -242 686 -514 107 -212 133 -442 76 -660 -49 -188 -170 -378 -320
                              -502 l-80 -66 109 -38 c178 -63 395 -177 503 -266 290 -238 449 -511 485 -834
                              l6 -55 -53 -50 c-29 -27 -82 -72 -118 -99 -36 -27 -67 -52 -70 -55 -21 -24
                              -235 -151 -352 -208 -239 -118 -499 -194 -778 -228 -162 -20 -446 -15 -610 11
                              -247 38 -497 117 -702 221 -120 61 -152 79 -232 132 -43 29 -80 52 -82 52 -8
                              0 -202 161 -233 193 -36 39 -36 27 -10 187 12 72 80 266 113 320 12 19 28 48
                              36 63 24 48 162 208 241 280 145 133 342 247 566 328 68 24 122 47 120 50 -1
                              3 -35 34 -76 68 -144 119 -260 299 -311 481 -30 105 -38 317 -16 420 82 393
                              387 696 771 768 70 14 260 14 331 1z"/>
                        </g>
                        </svg></a>
                </div>
            </div>     
            </br>
        </div> 
        <?php
        $error_msg = $this->session->flashdata('error_msg');
        if ($error_msg) {
            echo $error_msg;
        }
        ?>
        <?php echo form_open_multipart(base_url('admin/distribution')); ?>
        <form role="form" method="post" action="<?php echo base_url('admin/distribution'); ?>">
            <fieldset>
                <div class="row">
                    <div class="col-sm-4">
                        <input class="form-control" placeholder="Título" name="media_title" type="text" autofocus tabindex="1">
                        <input hidden="hidden" class="form-control" name="media_id" type="text">
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" placeholder="Descripción" name="media_description" type="text" autofocus tabindex="2"></textarea>
                    </div>

                </div>  
            </fieldset>                                

            <fieldset>
                </br>

                <div class="row">
                    <div class="col-sm-4">                             
                        <p>TAGS</p>
                    </div>                   
                    <div class="col-sm-4">
                        <p>VIDEO max. 10 Mb</p>
                    </div>

                    <div class="col-sm-4">                                  
                        <p>IMAGEN Ancho:400px Alto:200px</p>
                    </div>

                </div>
            </fieldset>
            <fieldset>
                <div class="row">
                    <div class="col-sm-4">                             
                        <input class="form-control" placeholder="TAGS" name="media_tags" type="text" autofocus tabindex="3">
                    </div>                   
                    <div class="col-sm-4">
                        <!-- <input class="form-control" placeholder="URL" name="media_address" type="text" autofocus tabindex="4"> -->
                        <input class="form-control" type="file" name="video" autofocus tabindex="4" />                              
                    </div>

                    <div class="col-sm-4">                                  
                        <input class="form-control" type="file" name="thumbnail" autofocus tabindex="5"/>                              
                    </div>

                </div>
                </br>
            </fieldset>                
            <fieldset>
                <div class="row">
                    <div class="col-sm-4">
                        <input class="btn btn-lg btn-danger btn-block" type="submit" value="Añadir" name="add" tabindex="5" > 
                    </div>                

                    <div class="col-sm-4 form-inline">
                        <div class="form-inline col-sm-6">    <input class="form-inline btn btn-lg btn-danger btn-block" type="submit" value="Borrar" name="delete"></div> <div class="form-inline col-sm-6"><input class="form-inline btn btn-lg btn-danger btn-block" type="submit" value="Modificar" name="modify"></div>
                    </div>                

                    <div class="col-sm-4">                                         
                        <input class="btn btn-lg btn-danger btn-block" type="submit" value="Filtrar" name="filter" >
                    </div>
                </div>
            </fieldset>
        </form>                      
        <!-- </div> -->
    </div>                      
</div>          
</div>
<table id="resultats" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Identificador</th> 
            <th>Título</th> 
            <th>Descripción</th>
            <th>Tags</th> 
            <th>Fecha</th>         
        </tr>
    </thead>
    <tbody>
        <?php
        if ($data) {
            foreach ($data as $fila) {
                //echo "<tr>";   
                echo "<tr>";
                echo "<td>";
                echo $fila['media_id'];
                echo "</td>";
                echo "<td>";
                echo $fila['media_title'];
                echo "</td>";
                echo "<td>";
                echo $fila['media_description'];
                echo "</td>";
                echo "<td>";
                echo $fila['media_tags'];
                echo "</td>";
                echo "<td>";
                echo $fila['media_date'];
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</div>
<div class="alert alert-success fixed-bottom" id="eventsResult">
    <?php
    if ($error) {
        echo $error;
    } else {
        echo "Registro de acciones";
    }
    ?>
</div>
</body>
</html>
