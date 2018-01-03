<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registre</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
  </head>
  <body>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4" style="margin:auto;"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Registre</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Nom" name="user_name" type="text" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Edat" name="user_age" type="number" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Telèfon" name="user_mobile" type="number" value="">
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Registra't" name="register" >

                          </fieldset>
                      </form>
                      <center><b>Estàs enregistrat?</b> <br></b><a href="<?php echo base_url('user/login_view'); ?>">Logat aquí</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>
