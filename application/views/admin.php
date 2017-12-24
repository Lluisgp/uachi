<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Administració</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://rawgit.com/wenzhixin/bootstrap-table/master/src/bootstrap-table.css">
        <script src="https://rawgit.com/wenzhixin/bootstrap-table/master/src/bootstrap-table.js"</script>
        <script src="https://rawgit.com/mindmup/editable-table/master/mindmup-editabletable.js"</script>
        
  <script type="text/javascript">
$(function () {
    var $result = $('#eventsResult');

    $('#eventsTable').on('all.bs.table', function (e, name, args) {
        console.log('Event:', name, ', data:', args);
    })
    .on('click-row.bs.table', function (e, row, $element) {
        $result.text('Event: click-row.bs.table');
    })
    .on('dbl-click-row.bs.table', function (e, row, $element) {
        $result.text('Event: dbl-click-row.bs.table');
    })
    .on('sort.bs.table', function (e, name, order) {
        $result.text('Event: sort.bs.table');
    })
    .on('check.bs.table', function (e, row) {
        $result.text('Event: check.bs.table');
    })
    .on('uncheck.bs.table', function (e, row) {
        $result.text('Event: uncheck.bs.table');
    })
    .on('check-all.bs.table', function (e) {
        $result.text('Event: check-all.bs.table');
    })
    .on('uncheck-all.bs.table', function (e) {
        $result.text('Event: uncheck-all.bs.table');
    })
    .on('load-success.bs.table', function (e, data) {
        $result.text('Event: load-success.bs.table');
    })
    .on('load-error.bs.table', function (e, status) {
        $result.text('Event: load-error.bs.table');
    })
    .on('column-switch.bs.table', function (e, field, checked) {
        $result.text('Event: column-switch.bs.table');
    })
    .on('page-change.bs.table', function (e, number, size) {
        $result.text('Event: page-change.bs.table');
    })
    .on('search.bs.table', function (e, text) {
        $result.text('Event: search.bs.table');
    });
});
</script>      
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
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Afegir" name="add" tabindex="5" > 
                        </div>                

                        <div class="col-sm-4 form-inline">
                            <div class="form-inline col-sm-6">    <input class="form-inline btn btn-lg btn-success btn-block" type="submit" value="Esborrar" name="delete"></div> <div class="form-inline col-sm-6"><input class="form-inline btn btn-lg btn-success btn-block" type="submit" value="Modificar" name="modify"></div>
                        </div>                

                        <div class="col-sm-4">                                         
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Filtrar" name="filter" >
                        </div>
                    </div>
                </fieldset>
            </form>                      
            <!-- </div> -->
        </div>                      
    </div>          
</div>
<div class="alert alert-success" id="eventsResult">
    Registre d'accions
</div>
<table id="eventsTable" class="table table-striped table-hover">
    <tr>  
        <th>Titol</th> 
        <th>Descripció</th>
        <th>Tags</th> 
        <th>Data</th>         
    </tr>

    <?php
    if ($data) {
        foreach ($data as $fila) {   
            echo "<tr>";            
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
    ?></table>
</div>
</body>
</html>
