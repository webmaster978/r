<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=rh_manager", "root", "#E[cTwmkD-3(");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOExeption $e) {
    die('Erreur : ' . $e->getMessage());
}

