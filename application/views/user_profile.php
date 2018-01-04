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
        <title>User Profile Dashboard-CodeIgniter Login Registration</title>    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4" style="margin:auto;">

                    <table class="table table-bordered table-striped">


                        <tr>
                            <th colspan="2"><h4 class="text-center">Información de usuario:</h3></th>

                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><?php echo $this->session->userdata('user_name'); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $this->session->userdata('user_email'); ?></td>
                        </tr>
                        <tr>
                            <td>Edad</td>
                            <td><?php echo $this->session->userdata('user_age'); ?></td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td><?php echo $this->session->userdata('user_mobile'); ?></td>
                        </tr>
                    </table>

                </div>                
            </div>
            <div class="col-md-4" style="margin:auto;">
                <a href="<?php echo base_url('user/user_logout'); ?>" >  <button type="button" class="btn-primary">Logout</button></a> <a href="<?php echo base_url('media/media_search'); ?>" >  <button type="button" class="btn-primary">Home</button></a> 
                <?php
                if ($user_admin == 1) {
                    echo '<a href="';
                    echo base_url('admin/admin_view');
                    echo '" >  <button type="button" class="btn-primary">Admin</button></a>';
                }
                ?>
            </div>
        </div>
    </body>
</html>
