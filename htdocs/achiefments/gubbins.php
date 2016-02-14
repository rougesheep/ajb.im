<?php
	include 'httpful.phar';
	include 'private.php';
	$base_url = "https://xboxapi.com/v2/";

	// Send request to xboxapi.com
	function xbox_api_request($uri) {
		global $private_apiKey;
		$response = \Httpful\Request::get($uri)
			->addHeader('X-AUTH', $private_apiKey)
			->send();
		return json_decode($response, true);
	}

	// Get xuid from gamertag
	function get_xuid($gamertag) {
		global $base_url;
		$request = $base_url . "xuid/" . $gamertag;
		$response = xbox_api_request($request);
		return $response;
	}

	// Get list of xbox one games
	function get_xbone_games($xuid) {
		global $base_url;
		$request = $base_url . $xuid . "/xboxonegames";
		$response = xbox_api_request($request);
		return $response;
	}

	/*
	 * MCC 1144039928
	 * H5  219630713
	 * Ori 264259050
	 */
	// Return list of achievements for specified game
	function get_achievements($gameID, $xuid) {
		global $base_url;
		$request = $base_url . $xuid . "/achievements/" . $gameID;
		$response = xbox_api_request($request);
		return $response;
	}

	// actually print each achievement to page
	function print_achievement($key) {
		global $showComplete;
		global $achievement;
		$imgSmall = "res/img/small/" . substr($achievement["mediaAssets"]["0"]["name"],0) . ".jpg";
		if ( $showComplete == false && $achievement["progressState"] != "Achieved") {
			echo "<div class=\"row top-buffer\">";
			echo "<div class=\"col-xs-12 col-md-2\"><a href=\"" . $achievement["mediaAssets"]["0"]["url"] . "\" target=\"_blank\"><img class=\"img-responsive\" src=\"" . $imgSmall . "\"></a></div>";
      echo "<div class=\"col-xs-12 col-md-10\">";
      echo "<h3>" . $achievement["name"] . " <small>" . $achievement["rewards"]["0"]["value"] . "G</small></h3>";
      echo "<p>" . $achievement["description"]  . "</p>";
			echo "</div></div>";
    }
	}
