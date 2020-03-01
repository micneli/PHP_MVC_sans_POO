<?php

function insertIntoDB($name, $email, $success, $uniqueId) {
  global $pdo;
  $sql = "INSERT INTO files SET name_source = :name_source, email_dest = :email_dest, zipped_file = :zipped_file, date = '', message = '' , uniq = :uniq";
  $req = $pdo->prepare($sql);
  $req->execute([":name_source" => $name, ":email_dest" => $email, ":zipped_file" => $success, ":uniq" => $uniqueId]);
  echo "OK";
  //$sql = "INSERT INTO files(date, name_source, email_dest, zipped_file, message, uniq) VALUES (:date, :name_source, :email_dest, :zipped_file, :message, :uniq)";
  // $req->bindParam(':name_source', $name);
  // $req->bindParam(':email_dest', $email);
  // $req->bindParam(':zipped_file', $success);
}

// Ludovic: $sql = "INSERT INTO files SET name_source = :name, email_dest = :email, zipped_file = :success";