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
echo "<pre>";
print_r($string);
echo "</pre>";

?>