<?php
require_once("../DB/DataBase.php");

class ReaderDAO
{
  public function viewReaders()
  {
    $dataBase = new DataBase();
    return $dataBase->Readers;
  }

  public function addReader($reader)
  {
    $dataBase = new DataBase();
    $dataBase->Readers[] = $reader;
    $dataBase->saveData();
  }

  public function editReader($id, $editedReader)
  {
    $dataBase = new Database();
    $readers = $dataBase->Readers;
    $readerFound = false;

    foreach ($readers as $index => $reader) {
      if ($reader->getId() == $id) {
        $readers[$index] = $editedReader;
        $readerFound = true;
        echo "\nReader edited successfully\n\n";
        break;
      }
    }

    if (!$readerFound) {
      echo "\nNo reader found with ID: $id\n\n";
    } else {
      $dataBase->Readers = $readers;
      $dataBase->saveData();
    }
  }

  public function deleteReader($id)
  {
    $dataBase = new DataBase();
    $readers = $dataBase->Readers;
    $readerFound = false;

    foreach ($readers as $index => $reader) {
      if ($reader->getId() == $id) {
        unset($readers[$index]);
        $readerFound = true;
        echo "\nReader deleted successfully\n\n";
        break;
      }
    }

    if (!$readerFound) {
      echo "\nNo reader found with ID: $id\n\n";
    } else {
      $dataBase->Readers = array_values($readers);
      $dataBase->saveData();
    }
  }
}
