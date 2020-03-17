<?php
    $host = "localhost";
    $dbname = "mvc_sanspoo";
    $user = "root";
    $pass = "";

    $projectName = "PHP_MVC_sans_POO";
    $projectNameLength = strlen($projectName) + 1;
    $base_url = mb_substr($_SERVER['REQUEST_URI'], 0, $projectNameLength);
    