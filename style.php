<?php
if (!isset($_GET['id']))
    $_GET['id'] = 'bootstrap';
header('Content-Type: text/css');
if (file_exists('styles/default/style/' . $_GET['id'] . '.css')) {
    $file = 'styles/default/style/' . $_GET['id'] . '.css';
} elseif (file_exists('styles/default/style/' . $_GET['id'] . '.min.css')) {
    $file = 'styles/default/style/' . $_GET['id'] . '.min.css';
}
echo file_get_contents($file);
?>