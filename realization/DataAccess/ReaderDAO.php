<?php
require_once("../DB/DataBase.php");

class ReaderDAO
{
  public function getReaders()
  {
    $dataBase = new DataBase();
    return $dataBase->retrieveData();
  }

  public function setReader($readers)
  {
    $dataBase = new DataBase();
    $dataBase->storeData($readers);
  }
}
