<?php
require_once('vendor/autoload.php');
use zlokomatic\phpLoL\LoLClient;

$summoner = isset($_GET['summoner']) ? $_GET['summoner'] : 'thegodofmc';
$validregions = array('br', 'eune', 'euw', 'lan', 'las', 'na', 'oce');

$region = strtolower(/*isset($_GET['region']) ? $_GET['region'] :*/ 'na');
if (!in_array($region, $validregions)) {
    $region = 'na';
}

$loader = new Twig_Loader_Filesystem('styles/default');
$twig = new Twig_Environment($loader);
$templates = array('index' => $twig->loadTemplate('index_body.html'), 'summoner' => $twig->loadTemplate('summoner_body.html'));


$lol = new LoLClient('stompacc', 'lander44', 'NA');
$summonerobj = $lol->getSummonerByName($summoner);
$test = $lol->getRecentGames($summonerobj->getAcctId());

echo $templates['summoner']->render(array(
    'summoner_icon' => $summonerobj->getProfileIconId(),
    'summoner_name' => $summonerobj->getName(),
    'summoner_region' => $region
));
?>
