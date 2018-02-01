<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=0.6, user-scalable=0">
        <meta property="og:url"           content="<?php echo base_url() . "media/media_show?media_id=" . $data["media_id"]; ?>" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="<?php echo $data['media_title']; ?>" />
        <meta property="og:description"   content="<?php echo $data['media_description']; ?>" />
        <meta property="og:image"         content="<?php echo base_url().'img/'.$data['media_id'].'.jpg'?>" />  
        <meta property="fb:app_id" content="165122097437172"/>

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
                });
            });
        </script>
    </head>
    <body>
        <?php $this->view('header'); ?>  
        <div id="fb-root"></div>
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
                            <textarea class="form-control" name="comment_body" value="" placeholder="Comentario" id='comment'></textarea>
                        </div>

                        <input type='hidden' name='parent_id' value="0" id='parent_id' />
                        <input type='hidden' name='ne_id' value="<?= $data['media_id'] ?>" id='parent_id'/>

                        <a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo urlencode(base_url() . "media/media_show?media_id=" . $data["media_id"]) ?>', 'ventanacompartir', 'toolbar = 0, status = 0, width = 650, height = 450');">
                            <div style="color:white; background-color: rgb(59, 89, 152); 
                                 width: 29px; line-height: 29px; height: 29px; 
                                 background-size: 16px; border-radius: 2px;" class="float-left"> 
                                <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z">
                                </path></svg>   
                            </div></a><a href="http://twitter.com/share?text=Mirad que acabo de ver !!! " title="Twitter" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_twitter" 
                                                                                                                                                                    style="background-color: rgb(85, 172, 238); width: 16px; line-height: 16px; height: 16px; background-size: 16px; border-radius: 2px;">
                                <div style="margin-left: 0.5em; color:#1da1f2; background-color:white; 
                                     width: 29px; line-height: 29px; height: 29px; 
                                     background-size: 16px; border-radius: 2px;" class="float-left"> 
                                    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#1da1f2" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93
                                                                                                                        0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942
                                                                                                                        0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935
                                                                                                                        4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013
                                                                                                                        0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></div></a>

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
