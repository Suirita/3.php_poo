<?php
require("../DataAccess/BookDAO.php");

class BookService
{
  public function getBooks()
  {
    $dataBase = new BookDAO();
    return $dataBase->getBooks();
  }

  public function setBook($book)
  {
    $new_book = [
      'id' => $book->getId(),
      'ISBN' => $book->getISBN(),
      'title' => $book->getTitle(),
    ];

    $bookDAO = new BookDAO();
    $bookDAO->setBook($new_book);
  }
}
