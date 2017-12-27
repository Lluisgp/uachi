<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Administració</title>               
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery-3.2.1.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
        
        
        <!-- jquery datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/> 
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
        <!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
        <script type = 'text/javascript' src = "<?php echo base_url();?>js/admin.js"></script>
    </head>
    <body>         
        <div class="container-fluid">
            <div class="row">          
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administració</h3>
                    </div>
                </div>
            </div>
            <?php
            $error_msg = $this->session->flashdata('error_msg');
            if ($error_msg) {
                echo $error_msg;
            }
            ?>
            <?php echo form_open_multipart(base_url('admin/distribution'));?>
            <form role="form" method="post" action="<?php echo base_url('admin/distribution'); ?>">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-4">
                            <input class="form-control" placeholder="Titol" name="media_title" type="text" autofocus tabindex="1">
                            <input hidden="hidden" class="form-control" name="media_id" type="text">
                        </div>
                        <div class="col-sm-8">
                            <textarea class="form-control" placeholder="Descripció" name="media_description" type="text" autofocus tabindex="2"></textarea>
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
                            <p>VIDEO</p>
                        </div>

                        <div class="col-sm-4">                                  
                            <p>IMATGE</p>
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
                            <input class="btn btn-lg btn-danger btn-block" type="submit" value="Afegir" name="add" tabindex="5" > 
                        </div>                

                        <div class="col-sm-4 form-inline">
                            <div class="form-inline col-sm-6">    <input class="form-inline btn btn-lg btn-danger btn-block" type="submit" value="Esborrar" name="delete"></div> <div class="form-inline col-sm-6"><input class="form-inline btn btn-lg btn-danger btn-block" type="submit" value="Modificar" name="modify"></div>
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
        <th>Titol</th> 
        <th>Descripció</th>
        <th>Tags</th> 
        <th>Data</th>         
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
    Registre d'accions
</div>
</body>
</html>
