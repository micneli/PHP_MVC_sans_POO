<?php

function insertIntoDB($name, $email, $success, $uniqueId)
{
  global $pdo;
  $sql = "INSERT INTO files SET name_source = :name_source, email_dest = :email_dest, zipped_file = :zipped_file, date = '', message = '' , uniq = :uniq";
  $req = $pdo->prepare($sql);
  $req->execute([":name_source" => $name, ":email_dest" => $email, ":zipped_file" => $success, ":uniq" => $uniqueId]);
  echo "OK";
}

// Ludo: $sql = "INSERT INTO files SET name_source = :name, email_dest = :email, zipped_file = :success";
