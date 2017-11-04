<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administration</title>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


  </head>
  <body>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Administration</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('admin/add_media'); ?>">
                          <fieldset>
                              <div class="row">
                              <div class="col-sm-4">
                                  <input class="form-control" placeholder="Title" name="media_title_en" type="text" autofocus>
                              </div>
                              <div class="col-sm-4">
                                  <input class="form-control" placeholder="Titulo" name="media_title_es" type="text" autofocus>
                              </div>
                              <div class="col-sm-4">
                                  <input class="form-control" placeholder="Títol" name="media_title_ca" type="text" autofocus>
                              </div>
                
                </div>
                <div class="row"></br></div>
                <div class="row">
                <div class="col-sm-4">
                                  <textarea class="form-control" placeholder="Description" name="media_description_en" type="text" autofocus></textarea>
                              </div>
                              <div class="col-sm-4">
                                  <textarea class="form-control" placeholder="Descripción" name="media_description_es" type="text" autofocus></textarea>
                              </div>
                              <div class="col-sm-4">
                                  <textarea class="form-control" placeholder="Descripció" name="media_description_ca" type="text" autofocus></textarea>
                              </div>
                              </br>
                              </div>
                              <div class="row"></br></div>
                              <div class="row">
                            <div class="col-sm-4">                             
                                <input class="form-control" placeholder="TAGS" name="media_tags" type="text" autofocus>
                            </div>
                            
                              <div class="col-sm-4">
                                  <input class="form-control" placeholder="URL" name="media_address" type="text" autofocus>
                              </div>

                              <div class="col-sm-4">                                  
                              </div>
                              </br>
                              </div>
                              <div class="row"></br></div>
                <div class="row">
                              <div class="col-sm-4">
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Add" name="add" > 
                              </div>                
                
                              <div class="col-sm-4">
                              </div>                
                
                              <div class="col-sm-4">                                         
                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Filter" name="filter" >
                              </div>
                </div>
                          </fieldset>
                      </form>                      
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>
