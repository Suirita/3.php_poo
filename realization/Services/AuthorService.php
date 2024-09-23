<?php
require("../DataAccess/AuthorDAO.php");

class AuthorService
{
  public function getAuthors()
  {
    $authorDAO = new AuthorDAO();
    $authorDAO->getAuthors();
    return $authorDAO["Authors"];
  }

  public function setAuthor($author)
  {
    $new_author = [
      'id' => $author->getId(),
      'first_name' => $author->getFirst_name(),
      'last_name' => $author->getLast_name(),
      'nationality' => $author->getNationality()
    ];

    $authors = $this->getAuthors();
    $authors[] = $new_author;

    $authorDAO = new AuthorDAO();
    $authorDAO->setAuthor($authors);
  }
}
