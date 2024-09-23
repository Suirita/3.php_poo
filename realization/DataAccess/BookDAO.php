<?php
require_once("../DB/DataBase.php");

class BookDAO
{
  public function getBooks()
  {
    $dataBase = new DataBase();
    return $dataBase->retrieveData();
  }

  public function setBook($books)
  {
    $dataBase = new DataBase();
    $dataBase->storeData($books);
  }
}
