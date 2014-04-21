<?php
require_once('vendor/autoload.php');
use zlokomatic\phpLoL\LoLClient;

header('Content-Type: application/json');

$info = $lol->retrieveInProgressSpectatorGameInfo(isset($_GET['summoner']) ? $_GET['summoner'] : 'thegodofmc');
$game = $info->getGame();
$team1 = $game->getTeamOne();
$team2 = $game->getTeamTwo();
foreach ($team1 as $num => $player) {
    $team1[$num] = $player->getSummonerName();
}
foreach ($team2 as $num => $player) {
    $team2[$num] = $player->getSummonerName();
}
var_dump((array)$game);
?>
