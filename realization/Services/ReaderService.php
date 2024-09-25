<?php
require("../DataAccess/ReaderDAO.php");

class ReaderService
{
  public function viewReaders()
  {
    $readerDAO = new ReaderDAO();
    return $readerDAO->viewReaders();
  }

  public function addReader($reader)
  {
    $readerDAO = new ReaderDAO();
    $readerDAO->addReader($reader);
  }

  public function editReader($id, $editedReader)
  {
    $readerDAO = new ReaderDAO();
    $readerDAO->editReader($id, $editedReader);
  }

  public function deleteReader($id)
  {
    $readerDAO = new ReaderDAO();
    $readerDAO->deleteReader($id);
  }
}
