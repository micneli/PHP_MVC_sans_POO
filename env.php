<?php
    $host = "localhost";
    $dbname = "mvc_sanspoo";
    $user = "root";
    $pass = "";
    // $dbname = "nebojsam__mvc_sanspoo";
    // $user = "nebojsam";
    // $pass = "s1au/5YBznD6mQ==";

    $projectName = "mvc_sansPOO";
    $projectNameLength = strlen($projectName) + 1;
    $base_url = mb_substr($_SERVER['REQUEST_URI'], 0, $projectNameLength);
    