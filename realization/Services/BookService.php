<?php
require("../DataAccess/BookDAO.php");

class BookService
{
  public function getBooks()
  {
    $bookDAO = new BookDAO();
    $bookDAO->getBooks();
    return $bookDAO["Books"];
  }

  public function setBook($book)
  {
    $new_book = [
      'id' => $book->getId(),
      'ISBN' => $book->getISBN(),
      'title' => $book->getTitle(),
      'publish_date' => $book->getPublish_date(),
      'author' => $book->getAuthor()
    ];

    $books = $this->getBooks();
    $books[] = $new_book;

    $bookDAO = new BookDAO();
    $bookDAO->setBook($books);
  }

  public function deleteBook($book) {}
}
