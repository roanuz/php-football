<?php
require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
$phpFootball = new PhpFootball\PhpFootballLib('YOUR_ACCESS_KEY', 'YOUR_SECRET_KEY', 'YOUR_APP_ID', 'UNIQUE_DEVICE_ID');

/**
* NOTE: To access the Roanuz Football API's data, you need Valid Match Keys.
*
* Here, you may try with some Free Match Keys.
*
*/
/* Get Match Details */
// $getMatch = $phpFootball->getMatch('MATCH_KEY');
// echo json_encode($getMatch);

/* Get Tournament Details */
// $getTournament = $phpFootball->getTournament('TOURNAMENT_KEY');
// echo json_encode($getTournament);

/* Get Tournament Team Details */
// $getTournamentTeam = $phpFootball->getTournamentTeam('TOURNAMENT_KEY','TEAM_KEY');
// echo json_encode($getTournamentTeam);

/* Get Tournament Round Details */
// $getTournamentRound = $phpFootball->getTournamentRound('TOURNAMENT_KEY','ROUND_KEY');
// echo json_encode($getTournamentRound);

/* Get Tournament Stats Details */
// $getTournamentStats = $phpFootball->getTournamentStats('TOURNAMENT_KEY');
// echo json_encode($getTournamentStats);

/* Get Tournament Team Stats Details */
// $getTournamentTeamStats = $phpFootball->getTournamentTeamStats('TOURNAMENT_KEY','TEAM_KEY');
// echo json_encode($getTournamentTeamStats);

/* Get Tournament Player Stats Details */
// $getTournamentPlayerStats = $phpFootball->getTournamentPlayerStats('TOURNAMENT_KEY','PLAYER_KEY');
// echo json_encode($getTournamentPlayerStats);

/* Get Schedule */
// $getSchedule = $phpFootball->getSchedule();
// $getSchedule = $phpFootball->getSchedule('2018-05');
// echo json_encode($getSchedule);

/* Get Tournament Schedule */
// $getTournamentSchedule = $phpFootball->getTournamentSchedule('TOURNAMENT_KEY');
// echo json_encode($getTournamentSchedule);

/* Get Recent Schedule */
// $getRecentTournament = $phpFootball->getRecentTournament();
// echo json_encode($getRecentTournament);

/* Get Matches in Round */
// $getTournamentMatches = $phpFootball->getTournamentMatches('TOURNAMENT_KEY','ROUND_KEY');
// echo json_encode($getTournamentMatches);

/* Get Matches in Round */
// $getRecentTournamentMatches = $phpFootball->getRecentTournamentMatches('TOURNAMENT_KEY');
// echo json_encode($getRecentTournamentMatches);

/* Get Tournament Standings */
// $getTournamentStandings = $phpFootball->getTournamentStandings('TOURNAMENT_KEY');
// echo json_encode($getTournamentStandings);