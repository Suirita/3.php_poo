<?php
require("../DataAccess/ReaderDAO.php");

class ReaderService
{
  public function getReaders()
  {
    $readerDAO = new ReaderDAO();
    $readerDAO->getReaders();
    return $readerDAO["Readers"];
  }

  public function setReader($reader)
  {
    $new_reader = [
      'id' => $reader->getId(),
      'card_number' => $reader->getCard_number(),
      'first_name' => $reader->getFirst_name(),
      'last_name' => $reader->getLast_name(),
      'address' => $reader->getAddress()
    ];

    $readers = $this->getReaders();
    $readers[] = $new_reader;

    $readerDAO = new ReaderDAO();
    $readerDAO->setReader($readers);
  }
}
