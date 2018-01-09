<?php
$user_id = $this->session->userdata('user_id');
$user_admin = $this->session->userdata('user_admin');

if (!$user_id) {

    redirect('user/login_view');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Información</title>

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
        <script type="text/javascript">
            function submitForm() {
                nombre = document.createElement('input');
                nombre.setAttribute('name', 'user_name');
                nombre.setAttribute('type', 'hidden');
                nombre.setAttribute('value', $("#nombre").html());
                $("#formulario").append(nombre);

                email = document.createElement('input');
                email.setAttribute('name', 'user_email');
                email.setAttribute('type', 'hidden');
                email.setAttribute('value', $("#email").html());
                $("#formulario").append(email);
                $("#formulario").submit();

                edad = document.createElement('input');
                edad.setAttribute('name', 'user_age');
                edad.setAttribute('type', 'hidden');
                edad.setAttribute('value', $("#edad").html());
                $("#formulario").append(edad);
                $("#formulario").submit();

                movil = document.createElement('input');
                movil.setAttribute('name', 'user_mobile');
                movil.setAttribute('type', 'hidden');
                movil.setAttribute('value', $("#movil").html());
                $("#formulario").append(movil);
                $("#formulario").submit();
            }
        </script>
    </head>
    <body>
        <?php
        $this->view('header');
        ?>
        <div class="container">

            <form id="formulario" role="form" method="post" action="<?php echo base_url('user/user_modify'); ?>">
                <div class="row">
                    <div class="col-md-4" style="margin:auto;">
                        <table class="table table-striped">
                            <tr>
                                <th colspan="2"><h4 class="text-center">Información de usuario:</h3></th>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td name="user_name" id="nombre" contenteditable='true'><?php echo $this->session->userdata('user_name'); ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td name="user_email" id="email" contenteditable='true'><?php echo $this->session->userdata('user_email'); ?></td>
                            </tr>
                            <tr>
                                <td>Edad</td>
                                <td name="user_age" id="edad" contenteditable='true'><?php echo $this->session->userdata('user_age'); ?></td>
                            </tr>
                            <tr>
                                <td>Teléfono</td>
                                <td name="user_mobile" id="movil" contenteditable='true'><?php echo $this->session->userdata('user_mobile'); ?></td>
                            </tr>
                        </table>

                    </div>                
                </div>
                <div class="col-md-4" style="margin:auto;">
                    <a href="<?php echo base_url('user/user_logout'); ?>" >  <button type="button" class="btn-primary">Salir</button></a> <a href="<?php echo base_url('user/user_password'); ?>" >  <button type="button" class="btn-primary">Password</button></a>  <a onclick="submitForm()" >  <button type="button" class="btn-primary">Modificar</button></a>
                    <?php
                    if ($user_admin == 1) {
                        echo '<a href="';
                        echo base_url('admin/admin_view');
                        echo '" >  <button type="button" class="btn-primary">Administrar</button></a>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>
