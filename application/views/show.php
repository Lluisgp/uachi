<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=0.6, user-scalable=0">
        <title>Uachit</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-3.2.1.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <!-- Custom files -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/custom.css">
        <style>
            a:hover, a:visited, a:link, a:active
            {
                color: black;
                text-decoration: none;
            }  
            .cercar{
                width: 50% !important;
            }
            body {
                background-color: black;
            }
        </style>
        <script type='text/javascript'>
            $(document).ready(function () {
                $(".reply").on("click", function () {
                    $("#lblresp").show("slow");
                    $(".alert").hide();
                    var id = $(this).attr("id");
                    $("#parent_id").attr("value", id);
                    $("#comment").focus();
                })
            });
        </script>
    </head>
    <body>
        <?php $this->view('header'); ?>         
        <div class="container-fluid">
            <?php
            if ($data) {
                echo '<div class="flex-row row">';
                echo '<h1 style="color:white; margin: auto;">';
                echo $data['media_title'];
                echo '</h1>';
                echo '</div>';
                echo '<div class="flex-row row">';
                echo '
<video style="margin: auto;padding-top: 20px;" width="640" height="480" controls autoplay>
	<source src="';
                echo base_url();
                echo 'play.php?stream=' . $data['media_id'] . '.mp4" type="video/mp4">

	<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="640" height="360">
		<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
		<param name="allowFullScreen" value="true">
		<param name="wmode" value="transparent">
		<param name="flashVars" value="config={\'playlist\':[{\'url\':\'./?stream=' . $data['media_id'] . '.mp4\',\'autoPlay\':true}]}">
		<span>No video playback capabilities</span>
	</object>
</video>';
                //common
                echo '</div>';
                echo '<div class="flex-row row">';
                echo '<h3 style="color:white; margin: auto; padding-top: 20px;">';
                echo $data['media_description'];
                echo '</h3>';
                ?>                  
            </div>

            <div class="flex-row row">

                <div class="col-xs-12 col-md-5" style="margin:auto;">
                    </br>
                    <form id="comment_form" action="<?= base_url() ?>media/add_comment" method='post'>                  
                        <div class="form-group">  
                            <span id="lblresp" style="display:none;" class="badge">Respondiendo</span>
                            <textarea autofocus class="form-control" name="comment_body" value="" placeholder="Comentario" id='comment'></textarea>
                        </div>

                        <input type='hidden' name='parent_id' value="0" id='parent_id' />
                        <input type='hidden' name='ne_id' value="<?= $data['media_id'] ?>" id='parent_id'/>

                        <div class="float-right" id='submit_button'>
                            <input class="btn btn-success" type="submit" name="submit" value="Añadir comentario"/>
                        </div>
                    </form>  
                    &nbsp;</br>  &nbsp;</br> 
                    <?php echo $comments ?>
                </div>
            <?php } ?>
        </div>

    </body>
</html>