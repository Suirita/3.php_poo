<?php

class Database
{
  public function retrieveData()
  {
    $file_path = "../DB/DataBase.json";

    if (!file_exists($file_path)) {
      return [
        "Books" => []
      ];
    }

    $json = file_get_contents($file_path);

    $Data = json_decode($json, true);

    return $Data;
  }

  public function storeData($data)
  {
    $file_path = "../DB/DataBase.json";

    $Data = $this->retrieveData();

    $Data['Books'][] = $data;

    $json = json_encode($Data, JSON_PRETTY_PRINT);

    file_put_contents($file_path, $json);
  }
}
