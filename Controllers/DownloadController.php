<?php

require_once('Models/Download.php');

$title = "Download";

$options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass, $options);

$uniqueId = $_GET['id'];

$name = getName($pdo, $uniqueId)['name_source'];
// $message = getMessage($pdo, $uniq)['message'];
$zipPath = getZipPath($pdo, $uniqueId)['zipped_file'];

require_once('Views/DownloadView.php');
