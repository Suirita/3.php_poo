<?php
require_once("../DB/DataBase.php");

class BorrowingDAO
{
  public function getBorrowings()
  {
    $dataBase = new DataBase();
    return $dataBase->retrieveData();
  }

  public function setBorrowing($borrowing)
  {
    $dataBase = new DataBase();
    $dataBase->storeData($borrowing, "Borrowings");
  }
}
