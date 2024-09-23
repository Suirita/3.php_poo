<?php

class Database
{
  public function retrieveData()
  {
    $file_path = "../DB/DataBase.json";

    $json = file_get_contents($file_path);
    $Data = json_decode($json, true);

    return $Data;
  }

  public function storeData($data)
  {
    $file_path = "../DB/DataBase.json";

    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($file_path, $json);
  }
}
