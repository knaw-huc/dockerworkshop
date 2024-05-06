<?php

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
    echo '<p>Wees gegroet, ' . htmlspecialchars($_REQUEST['naam']) . '</p>';
}

echo '</body></html>';