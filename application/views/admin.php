<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Administració</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
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
                            <input class="form-control" placeholder="Title" name="media_title_en" type="text" autofocus tabindex="1">
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" placeholder="Titulo" name="media_title_es" type="text" autofocus>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" placeholder="Títol" name="media_title_ca" type="text" autofocus>
                        </div>
                    </div>  
                </fieldset>                                
                <fieldset>

                    </br>
                    <div class="row">
                        <div class="col-sm-4">
                            <textarea class="form-control" placeholder="Description" name="media_description_en" type="text" autofocus tabindex="2"></textarea>
                        </div>
                        <div class="col-sm-4">
                            <textarea class="form-control" placeholder="Descripción" name="media_description_es" type="text" autofocus></textarea>
                        </div>
                        <div class="col-sm-4">
                            <textarea class="form-control" placeholder="Descripció" name="media_description_ca" type="text" autofocus></textarea>
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
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add" name="add" tabindex="5" > 
                        </div>                

                        <div class="col-sm-4 form-inline">
                            <div class="form-inline col-sm-6">    <input class="form-inline btn btn-lg btn-success btn-block" type="submit" value="Delete" name="delete"></div> <div class="form-inline col-sm-6"><input class="form-inline btn btn-lg btn-success btn-block" type="submit" value="Modify" name="modify"></div>
                        </div>                

                        <div class="col-sm-4">                                         
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Filter" name="filter" >
                        </div>
                    </div>
                </fieldset>
            </form>                      
            <!-- </div> -->
        </div>                      
    </div>          
</div>

<div class="container"> <div class="row"></br>&nbsp;</div></div>

<table class="table table-striped">
    <tr>  
        <th>Title</th> 
        <th>Description</th>
        <th>Tags</th> 
        <th>Date</th>
        <th>Link</th>    
    </tr>

    <?php
    if ($data) {
        foreach ($data as $fila) {
            echo "<tr>";
            echo "<td>";
            echo $fila['media_title_es'];
            echo "</td>";
            echo "<td>";
            echo $fila['media_description_es'];
            echo "</td>";
            echo "<td>";
            echo $fila['media_tags'];
            echo "</td>";
            echo "<td>";
            echo $fila['media_date'];
            echo "</td>";
            echo "<td>";
            echo $fila['media_address'];
            echo "</td>";
            echo "</tr>";
        }
    }

//latest three record
// foreach ($last_three as $perreq) 
// {
//     echo $perreq->media_title_es;
//     echo "<br>";
// } 
//total count
// echo $num_rows;
    ?></table>
</div>
</body>
</html>
