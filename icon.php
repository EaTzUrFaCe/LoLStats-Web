<?php
require_once('vendor/autoload.php');
header('Content-Type: image/png');
$id = @$_GET['id'];

if (file_exists(sprintf(__DIR__ . '/cache/summonerIcons/%s.png', $id))) {
    echo(file_get_contents(sprintf(__DIR__ . '/cache/summonerIcons/%s.png', $id)));
} else {
    $version = json_decode(file_get_contents('http://ddragon.leagueoflegends.com/realms/na.json'), true)['v'];
    $img = @file_get_contents(sprintf('http://ddragon.leagueoflegends.com/cdn/%s/img/profileicon/%s.png', $version, $id));
    if ($img !== false) {
        file_put_contents(sprintf(__DIR__ . '/cache/summonerIcons/%s.png', $id), $img);
        echo($img);
    } else {
        echo(file_get_contents(__DIR__ . '/cache/summonerIcons/-1.png'));
    }
}
?>
