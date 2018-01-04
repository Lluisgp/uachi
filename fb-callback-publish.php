

<html>
    <head>
        <meta charset="utf-8">
        <title>Facebook login</title>       
        <script type = 'text/javascript' src = "js/jquery-3.2.1.js"></script> 
        <script type="text/javascript">
            $(document).ready(function () {
        document.faceform.submit();
            });
        </script>
        <?php
        require_once 'Facebook/autoload.php';

        $fb = new Facebook\Facebook([
            'app_id' => 'secret',
            'app_secret' => 'secret',
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
        try {
            $accessToken = $helper->getAccessToken();
            $response = $fb->get('/me?fields=name,email,location', $accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());
// The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

        try {
// Validation (these will throw FacebookSDKException's when they fail)
            $tokenMetadata->validateAppId('secret'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
            $tokenMetadata->validateExpiration();
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Access Token - Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!$accessToken->isLongLived()) {
            echo '<p>Long lived check</p>';
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }
            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
        } else {

            $user = $response->getGraphUser();
            
            echo '<form method="post" name="faceform" action="user/login_user_facebook">';
            //echo base_url('user/login_user_facebook');     
            //echo '">';
            echo '<input name="user_email" type="email" ';
            echo 'value="';
            echo $user->getEmail();
            echo '">';
            echo '<input name="user_name" type="text" ';
            echo 'value="';
            echo $user->getName();
            echo '">';
            echo '<input type="submit" value="login" name="login" >';
            echo '</form>';
        }
        $_SESSION['fb_access_token'] = (string) $accessToken;
        ?>