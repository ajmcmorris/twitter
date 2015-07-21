<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" type="text/css" rel="stylesheet">
<!-- FontAwesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?php
require_once('TwitterAPIExchange.php');
// Twitter OAuth Config options
$settings = array(
'oauth_access_token' => '262964097-fHTGVuhHD0cQjspe1hQsX4uYn6vkPqzaYLZJBIi3',
'oauth_access_token_secret' => 'bE7XTmsjlEjTeh3tkyZGWiyeP1CvpS8zZl2mQG2V1AUb3',
'consumer_key' => 'nkwFYnXmlhtSSbalkZUz1gTOd',
'consumer_secret' => 'QIGEVIZ6zpuYo1byZscsn8u0BGu4OMasVsdpBzXuM1faGxDJid'
);
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = "GET";

$getfield = '?screen_name=ajmcmorris&count=20';

$twitter = new TwitterAPIExchange($settings);

$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
echo '<div class="container-fluid">';
echo '<section class="col-md-6 col-md-offset-3">';
foreach($string as $items)
    {   
        echo '<div class="my-tweet">';
    	echo '<div class="row">';
        echo "<img src=".$items['user']['profile_image_url']."/>";
        echo '<dl>';
        echo  "<dt>".$items['user']['name']."</dt>";
        echo  "<dd>"."@".$items['user']['screen_name']."</dd>";
        echo '</dl>';
        echo "<p>".$items['text']."</p>";      
        echo $items['created_at'];
        echo '<p><a href="#"><i class="fa fa-reply"></a></i> <a href="#"><i class="fa fa-retweet"></i>'.$items['retweet_count']."</p></a>"; 
        echo '</div>';
        echo '</div>';
    }
echo '</section>';
echo '</div>';
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.js"></script>
