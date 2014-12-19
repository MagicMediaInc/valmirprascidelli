<?php
	require_once('api/TwitterAPIExchange.php');
	$settings = array(	"oauth_access_token"=>"113253730-i2lFgNAI9QTr8iOVe9L9DwAc0ZO6e6GomZm225rA",
						"oauth_access_token_secret"=>"Dei3MBy62gLOxrjbfEAb6LI8I8Rj0CUK8nSdJ19tXjSdV",
						"consumer_key"=>"4njC5vMiTROT9Z7NQVFdIeXHQ",
						"consumer_secret"=>"cGqwOMFg538Cmhads8KGXVILilMt5uWyFCTwI4Q9u9OpuaEGWo"

		);
	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	$requestMethod = "GET";
	$parameters = array("screen_name"=>"Prascidelli", "count"=>"5");

	$twitter = new TwitterAPIExchange($settings);

	$responses = $twitter->setGetfield('?screen_name=Prascidelli&count=5')
						 ->buildOauth($url, $requestMethod)
						 ->performRequest();
	$json=json_decode($responses);

	$tweets=array();
	$i=0;
		foreach($json as $key=>$value):
    		$tweets[$i]["tweet"]=$value->text;
    		$tweets[$i]["fecha"]=$value->created_at;
    		$i++;
    		 // array_push($tweets,"fecha",$value->created_at);
		endforeach;

	// var_dump($tweets);



	function finish() {
    header("content-type:application/json; charset:utf-8s");
    if ($_GET['callback']) {
        print $_GET['callback']."(";
    }
    print json_encode($GLOBALS['tweets']);
    if ($_GET['callback']) {
        print ")";
    }
    exit; 
	}

	finish();
	// echo "<ul>";
	// 	foreach($json as $key=>$value):
	// 		print "<li>";
 //    		print $value->text;
 //    		print "</li>";
	// 	endforeach;
	// echo "</ul>";