<?php
require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
$phpFootball = new PhpFootball\PhpFootballLib('475d7a656b0473d8f0504f9de1547da1', '8ea049f3492c94b730e1765b24667c1f', 'test_footballapi', 'developer');

/**
* NOTE: To access the Roanuz Football API's data, you need Valid Match Keys.
*
* Here, you may try with some Free Match Keys.
*
*/
/* Get Match Details */
// $getMatch = $phpFootball->getMatch('1214815992417488898');
// echo json_encode($getMatch);

/* Get Tournament Details */
// $getTournament = $phpFootball->getTournament('1214777636782477313');
// echo json_encode($getTournament);

/* Get Tournament Team Details */
// $getTournamentTeam = $phpFootball->getTournamentTeam('1214777636782477313','1019527695853293577');
// echo json_encode($getTournamentTeam);

/* Get Tournament Round Details */
// $getTournamentRound = $phpFootball->getTournamentRound('1214777636782477313','1214782682358222849');
// echo json_encode($getTournamentRound);

/* Get Tournament Stats Details */
// $getTournamentStats = $phpFootball->getTournamentStats('1214777636782477313');
// echo json_encode($getTournamentStats);

/* Get Tournament Team Stats Details */
// $getTournamentTeamStats = $phpFootball->getTournamentTeamStats('1214777636782477313','1218087745809944577');
// echo json_encode($getTournamentTeamStats);

/* Get Tournament Player Stats Details */
// $getTournamentPlayerStats = $phpFootball->getTournamentPlayerStats('1214777636782477313','1002227290479923221');
// echo json_encode($getTournamentPlayerStats);

/* Get Schedule */
// $getSchedule = $phpFootball->getSchedule();
// $getSchedule = $phpFootball->getSchedule('2018-05');
// echo json_encode($getSchedule);

/* Get Tournament Schedule */
// $getTournamentSchedule = $phpFootball->getTournamentSchedule('1214777636782477313');
// echo json_encode($getTournamentSchedule);

/* Get Recent Schedule */
// $getRecentTournament = $phpFootball->getRecentTournament();
// echo json_encode($getRecentTournament);

/* Get Matches in Round */
// $getTournamentMatches = $phpFootball->getTournamentMatches('1214777636782477313','1214782682358222849');
// echo json_encode($getTournamentMatches);

/* Get Matches in Round */
// $getRecentTournamentMatches = $phpFootball->getRecentTournamentMatches('1214777636782477313');
// echo json_encode($getRecentTournamentMatches);

/* Get Tournament Standings */
// $getTournamentStandings = $phpFootball->getTournamentStandings('1214777636782477313');
// echo json_encode($getTournamentStandings);

/* Get Fantasy Credit points*/
// $getFantasyCreditPoints = $phpFootball->getFantasyCreditPoints('1214815992417488898', 'RZ-C-A100');
// echo json_encode($getFantasyCreditPoints);

/* Get Fantasy Match Credit Variation*/
// $getFantasyMatchCreditVariation = $phpFootball->getFantasyMatchCreditVariation('1214815992417488898', 'RZ-C-A100');
// echo json_encode($getFantasyMatchCreditVariation);

/* Get Fantasy Match Credit Variation*/
$getFantasyMatchPoint = $phpFootball->getFantasyMatchPoint('1214815992417488898', 'RZ-C-A100');
echo json_encode($getFantasyMatchPoint);