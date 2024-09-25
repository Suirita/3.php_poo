<?php

class Database
{
  public $Books = [];
  public $Authors = [];
  public $Readers = [];
  public $Borrowings = [];

  public function __construct()
  {
    $this->retrieveData();
  }

  private function retrieveData()
  {
    $file_path = "../DB/DataBase.txt";

    if (file_exists($file_path)) {
      $content = file_get_contents($file_path);
      $Data = unserialize($content);
      $this->Books = $Data->Books;
      $this->Authors = $Data->Authors;
      $this->Readers = $Data->Readers;
      $this->Borrowings = $Data->Borrowings;
    }
  }

  private function storeData()
  {
    $file_path = "../DB/DataBase.txt";
    $Data = serialize($this);
    file_put_contents($file_path, $Data);
  }

  public function saveData()
  {
    $this->storeData();
  }
}
