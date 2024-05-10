<?php

function connect_to_db()
{
    return new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_DB , DATABASE_USER, DATABASE_PASSWORD);
}
function save_opgave_to_db($naam, $ip, $browser)
{
    $db = connect_to_db();
    $sql= 'INSERT INTO opgaven (naam, ip, browser) VALUES (:naam, :ip, :browser)';
    $statement = $db->prepare($sql);
    $statement->execute([
        ':naam' => $naam,
        ':ip' => $ip,
        ':browser' => $browser
    ]);
}

function get_opgaven()
{
    $db = connect_to_db();
    return $db->query("SELECT * FROM opgaven ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
}