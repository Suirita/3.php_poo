<?php
require("../DataAccess/AuthorDAO.php");

class AuthorService
{
  public function viewAuthors()
  {
    $authorDAO = new AuthorDAO();
    return $authorDAO->viewAuthors();
  }

  public function addAuthor($author)
  {
    $authorDAO = new AuthorDAO();
    $authorDAO->addAuthor($author);
  }

  public function editAuthor($id, $editedAuthor)
  {
    $authorDAO = new AuthorDAO();
    $authorDAO->editAuthor($id, $editedAuthor);
  }

  public function deleteAuthor($id)
  {
    $authorDAO = new AuthorDAO();
    $authorDAO->deleteAuthor($id);
  }
}
