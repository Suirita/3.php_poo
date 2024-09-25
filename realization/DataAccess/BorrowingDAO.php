<?php
require_once("../DB/DataBase.php");

class BorrowingDAO
{
  public function viewBorrowings()
  {
    $dataBase = new DataBase();
    return $dataBase->Borrowings;
  }

  public function addBorrowing($borrowing)
  {
    $dataBase = new DataBase();
    $dataBase->Borrowings[] = $borrowing;
    $dataBase->saveData();
  }

  public function editBorrowing($id, $editedBorrowing)
  {
    $dataBase = new Database();
    $borrowings = $dataBase->Borrowings;
    $borrowingFound = false;

    foreach ($borrowings as $index => $borrowing) {
      if ($borrowing->getId() == $id) {
        $borrowings[$index] = $editedBorrowing;
        $borrowingFound = true;
        echo "\nBorrowing edited successfully\n\n";
        break;
      }
    }

    if (!$borrowingFound) {
      echo "\nNo borrowing found with ID: $id\n\n";
    } else {
      $dataBase->Borrowings = $borrowings;
      $dataBase->saveData();
    }
  }

  public function deleteBorrowing($id)
  {
    $dataBase = new DataBase();
    $borrowings = $dataBase->Borrowings;
    $borrowingFound = false;

    foreach ($borrowings as $index => $borrowing) {
      if ($borrowing->getId() == $id) {
        unset($borrowings[$index]);
        $borrowingFound = true;
        echo "\nBorrowing deleted successfully\n\n";
        break;
      }
    }

    if (!$borrowingFound) {
      echo "\nNo borrowing found with ID: $id\n\n";
    } else {
      $dataBase->Borrowings = array_values($borrowings);
      $dataBase->saveData();
    }
  }
}
