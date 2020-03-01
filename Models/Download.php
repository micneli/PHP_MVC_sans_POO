<?php

function getZipPath($pdo, $uniqueId) {
  $sql = "SELECT zipped_file FROM files WHERE uniq = $uniqueId";
  $req = $pdo->prepare($sql);
  $req->execute();
  $result = $req->fetch();
  //return $result['zipped_file']; 
  return $result;
}

function getName($pdo, $uniqueId) {
  $sql = "SELECT name_source FROM files WHERE uniq = $uniqueId";
  $req = $pdo->prepare($sql);
  $req->execute();
  $result = $req->fetch();
  //return $result['name_source'];
  return $result;
}