<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registro</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-3.2.1.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
        <style>            
            .cercar{
                width: 50% !important;
            }
        </style>
    </head>
    <body>
        <?php
        $this->view('header');
        ?>
        <span style="background-color:red;">
            <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
                <div class="row"><!-- row class is used for grid system in Bootstrap-->
                    <div class="col-md-4 col-md-offset-4" style="margin:auto;"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                        <div class="login-panel panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Registro</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nombre" name="user_name" type="text" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" placeholder="Edad" name="user_age" type="number" value="">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" placeholder="Teléfono" name="user_mobile" type="number" value="">
                                        </div>

                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Registrate" name="register" >

                                    </fieldset>
                                </form>
                                <?php
                                require_once 'Facebook/autoload.php';
                                $fb = new Facebook\Facebook([
                                    'app_id' => 'secret',
                                    'app_secret' => 'secret',
                                    'default_graph_version' => 'v2.2',
                                ]);

                                $helper = $fb->getRedirectLoginHelper();

                                $permissions = ['email', 'public_profile']; // Optional permissions
                                $loginUrl = $helper->getLoginUrl(base_url() . 'fb-callback.php', $permissions);

                                echo '<center><a href="' . htmlspecialchars($loginUrl) . '">O entra con Facebook!</a></center>';
                                ?>
                                <center><b>¿Estas registrado?</b> <br></b><a href="<?php echo base_url('user/login_view'); ?>">Entra aquí</a></center><!--for centered text-->
                            </div>
                        </div>
                    </div>
                </div>
        </span>
    </body>
</html>
