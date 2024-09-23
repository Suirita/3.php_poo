<?php
require_once("../DB/DataBase.php");

class AuthorDAO
{
  public function getAuthors()
  {
    $dataBase = new DataBase();
    return $dataBase->retrieveData();
  }

  public function setAuthor($authors)
  {
    $dataBase = new DataBase();
    $dataBase->storeData($authors);
  }
}
