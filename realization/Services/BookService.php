<?php
require("../DataAccess/BookDAO.php");

class BookService
{
  public function viewBooks()
  {
    $bookDAO = new BookDAO();
    return $bookDAO->viewBooks();
  }

  public function viewAvailableBooks()
  {
    $bookDAO = new BookDAO();
    return $bookDAO->viewAvailableBooks();
  }

  public function searchBookByTitle($title)
  {
    $bookDAO = new BookDAO();
    return $bookDAO->searchBookByTitle($title);
  }

  public function searchBookByISBN($ISBN)
  {
    $bookDAO = new BookDAO();
    return $bookDAO->searchBookByISBN($ISBN);
  }

  public function searchBookByAuthor($author)
  {
    $bookDAO = new BookDAO();
    return $bookDAO->searchBookByAuthor($author);
  }

  public function addBook($book)
  {
    $bookDAO = new BookDAO();
    $bookDAO->addBook($book);
  }

  public function editBook($id, $editedBook)
  {
    $bookDAO = new BookDAO();
    $bookDAO->editBook($id, $editedBook);
  }

  public function deleteBook($id)
  {
    $bookDAO = new BookDAO();
    $bookDAO->deleteBook($id);
  }
}
