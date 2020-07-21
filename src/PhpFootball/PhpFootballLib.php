<?php
/**
 * @package 	Football-API 
 * @author 		FootballAPI Team (Roanuz Softwares)
 * @version 	1.0.0
 * 
 * Description: This is a php library to get live football score, recent matches and 
 * schedules using Roanuz Football API.
 * 
 * @link https://www.footballapi.com/
 */

namespace PhpFootball;

/**
* Configuration details to access Roanuz Football API Data.
*
* @param RFA_url			Url of Roanuz Football API which gives response by sending request.
*
*/
define('RFA_url', 'https://api.footballapi.com/v1/');
class PhpFootballLib {
	private $access_token;
	private $credentials;

	/**
	* Authentication
	*
	* auth function
	*
	* This function provides you an access token by validating your request which allows you to call remaining functions.
	* Call this auth function whenever your access token is expired.
	*
	*/
	public function __construct($accessKey, $secretKey, $appId, $deviceId){
		$this->credentials = array(
			'access_key' => $accessKey, // Your Valid Access Key
			'secret_key' => $secretKey, // Your Valid Secret Key
			'app_id' => $appId,         // Your Valid App Id
			'device_id' => $deviceId 	// Your Unique Device Id
		);
		$this->access_token = $this->getValidToken();
	}

	/**
	* saveAccessKey
	*
	* This function will get the provide valid token, and save it in accesstoken.txt file.
	* This access token will be automatically passed to getData() to get the response.
	*
	*/
	public function saveAccessKey(){
		//Encode the Credentials into JSON.
		$requestHeaderData = json_encode($this->credentials);
		$ch = curl_init(RFA_url.'auth/');
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, true);
		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestHeaderData);
		//Get actual API value.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		//Execute the request
		$response = curl_exec($ch);
		echo "\nType: ";
		print_r(gettype($response));
		$response = json_decode($response, true);
		curl_close($ch);
		// Store access token & expire time to a file.
		$tokenData = array( $this->credentials['device_id'] => 
							array(
								'token' => $response['auth']['access_token'],
								'expires' => $response['auth']['expires'],
								'deviceId' => $this->credentials['device_id']
							)
						);
		$fp = fopen('accesstoken.txt','w');
		$stringData = json_encode($tokenData);
		fwrite($fp, $stringData);
		echo "\nToken : ".$response['auth']['access_token']."\n\n";
		return $response['auth']['access_token'];
	}

	/**
	* getValidToken
	*
	* This function will get the provide valid token.
	* This access token will be automatically passed to getData() to get the response.
	*
	*/
	function getValidToken(){
		$deviceCheck = $this->credentials['device_id'];
		if(file_exists('accesstoken.txt')){
			$infotxt = file_get_contents('accesstoken.txt'); 
			$info = json_decode($infotxt, TRUE);
			if(time() >= ($info[$deviceCheck]['expires'] )){
				$this->saveAccessKey();
				return $info[$deviceCheck]['token'];
			}else{
				return $info[$deviceCheck]['token'];
			}
		}else{
			$this->saveAccessKey();
			echo "Access token file created. Refresh the page or request again to get data.";
			return;
		}
	}

	/**
	* getData function
	*
	* This function will build the query url for calling API.
	*
	* @param $req_url		Pass the desired API url value.
	* @param $fields        Pass the parameters for appending to API.
	*
	*/
	function getData($req_url, $fields=array()){
		$url = RFA_url. $req_url. '/?access_token=' . $this->access_token . '&' . http_build_query($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$response = json_decode($response, true);
		curl_close($ch);
		return $response;
	}

	/**
	* Match:
	*
	* getMatch function
	* 
	* This function provides full details of a match.
	*
	* @param $match_key 			Key of match to show the Match details.
	*
	*/
	function getMatch($match_key){
		$url = 'match/' .$match_key;
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament:
	* getTournament function
	* This function provides full details of a Tournament.
	* @param $tournament_key 			Key of match to show the Match details.
	*/
	function getTournament($tournament_key){
		$url = 'tournament/' .$tournament_key;
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament Team:
	* getTournamentTeam function
	* This function provides the team details of a Tournament.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	* @param $team_key 					Key of team to show the tournament team details.
	*/
	function getTournamentTeam($tournament_key,$team_key){
		$url = 'tournament/' .$tournament_key.'/team/'.$team_key;
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament Round:
	* getTournamentRound function
	* This function provides full details of rounds of a tournament.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	* @param $round_key 				Key of round to show the tournament round details.
	*/
	function getTournamentRound($tournament_key,$round_key){
		$url = 'tournament/' .$tournament_key.'/round/'.$round_key;
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament Stats:
	* getTournamentStats function
	* This function provides full tournament statistics.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	*/
	function getTournamentStats($tournament_key){
		$url = 'tournament/' .$tournament_key.'/stats';
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament Team Stats:
	* getTournamentTeamStats function
	* This function provides Statistics of Team for a tournament.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	* @param $team_key 					Key of team to show the Tournament Team details.
	*/
	function getTournamentTeamStats($tournament_key,$team_key){
		$url = 'tournament/' .$tournament_key.'/team/'.$team_key.'/stats';
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament Player Stats API:
	* getTournamentPlayerStats function
	* This function provides player statistics of a tournament.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	* @param $player_key 				Key of player to show the Tournament Player Stats.
	*/
	function getTournamentPlayerStats($tournament_key,$player_key){
		$url = 'tournament/' .$tournament_key.'/player/'.$player_key.'/stats';
		$response = $this->getData($url);
		return $response;
	}


	/**
	* Tournament Schedule API:
	* getTournamentSchedule function
	* This function provides full tournament Schedule.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	*/
	function getTournamentSchedule($tournament_key){
		$url = 'tournament/' .$tournament_key.'/schedule';
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Recent Tournament API:
	* getRecentTournament function
	* This function provides full details of recent tournament.
	*/
	function getRecentTournament(){
		$url = 'recent_tournaments';
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Matches in Round API:
	* getTournamentMatches function
	* This function provides tournament match details.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	* @param $round_key 				Key of round to show the tournament round details.
	*/
	function getTournamentMatches($tournament_key,$round_key){
		$url = 'tournament/' .$tournament_key.'/matches/'.$round_key;
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Recent Tournament Matches API:
	* getRecentTournamentMatches function
	* This function provides full details of recent tournament matches.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	*/
	function getRecentTournamentMatches($tournament_key){
		$url = 'tournament/' .$tournament_key.'/matches';
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Tournament Standings API:
	* getTournamentStandings function
	* This function provides Point Details of a tournament.
	* @param $tournament_key 			Key of tournament to show the Tournament details.
	*/
	function getTournamentStandings($tournament_key){
		$url = 'tournament/' .$tournament_key.'/standings';
		$response = $this->getData($url);
		return $response;
	}


	/**
	* Fantasy Credit points API:
	* getFantasyCreditPoints function
	* This function provides fantasy credit Point Details of a match.
	* @param $match_key 			Key of match to show match details.
	*/
	function getFantasyCreditPoints($match_key, $model){
		$fields = array(
			'model' => $model
		);
		$url = 'fantasy-match-credits/' .$match_key;
		$response = $this->getData($url,$fields);
		return $response;
	}

	/**
	* Fantasy Match Credit variation API:
	* getFantasyMatchCreditVariation function
	* This function provides fantasy Match credit Variation Details.
	* @param $match_key 			Key of match to show match details.
	*/
	function getFantasyMatchCreditVariation($match_key,$model){
		$fields = array(
			'model' => $model
		);
		$url = 'fantasy-match-credits-variation/' .$match_key;
		$response = $this->getData($url);
		return $response;
	}

	/**
	* Fantasy Match Point API:
	* getFantasyMatchPoint function
	* This function provides fantasy Match Point Details.
	* @param $match_key 			Key of match to show match details.
	*/
	function getFantasyMatchPoint($match_key,$model){
		$fields = array(
			'model' => $model
		);
		$url = 'fantasy-match-credits-variation/' .$match_key;
		$response = $this->getData($url);
		return $response;
	}


}