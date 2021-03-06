<?php

function dbConnect($dbserver,$dbuser,$dbpassword,$dbname,$codepage){
  $db = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
  if ($db->connect_error) {
      throw new DBException('DB connection error:'.$db->connect_errno.' '.$db->connect_error,$db->connect_errno);
  }
  $db->set_charset($codepage);
  return $db;
}

function dbTableName($name){
  return $name;
}

function dbQuery($db,$sql,$throwException=true){
  $result=null;
  $result=$db->query($sql);
  if(!$result && $throwException){
    throw new DBException('DB error:'.$db->errno.' '.$db->error,$db->errno);
  }
  return $result;
}

class DBException extends Exception {}
?>
