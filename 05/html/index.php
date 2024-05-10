<?php

require('config.inc.php');
require('functions.inc.php');

echo '<!DOCTYPE html>
<html>
<head>
    <title>HuC DI</title>
</head>
<body>
<img src="logo-knaw-humanities-cluster.png"/>
<h1>HuC DI</h1>';

if (! isset($_REQUEST['submit'])) {
    echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
    echo 'Naam: <input type="text" name="naam" size="20" value=""/><br><br>';
    echo '<input type="submit" name="submit">';
    echo '</form>';
} else {
    save_opgave_to_db($_REQUEST['naam'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
    echo '<p>Wees gegroet, ' . htmlspecialchars($_REQUEST['naam']) . '<br><a href="/">terug</a></p>';
}

echo '<h2>Reeds opgegeven</h2>';
echo '<table border="1">';
echo '<tr><th>id</th><th>naam</th><th>ip</th><th>browser</th><th>tijd</th></tr>';
foreach(get_opgaven() as $opgave) {
    echo '<tr>';
    echo '<td>' . join('</td><td>', $opgave) . '</td>';
    echo '</tr>';
}
echo '</table>';

echo '</body></html>';