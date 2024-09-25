<?php
require("../DB/DataBase.php");

class BookDAO
{
  public function viewBooks()
  {
    $dataBase = new DataBase();
    return $dataBase->Books;
  }

  public function viewAvailableBooks()
  {
    $dataBase = new DataBase();
    $books = $dataBase->Books;
    $borrowings = $dataBase->Borrowings;

    $availableBooks = [];

    foreach ($books as $book) {
      $isBorrowed = false;
      foreach ($borrowings as $borrowing) {
        if ($book->getId() == $borrowing->getBook()) {
          if (empty($borrowing->getActual_return_date())) {
            $isBorrowed = true;
            break;
          }
        }
      }

      if (!$isBorrowed) {
        $availableBooks[] = $book;
      }

      return $availableBooks;
    }
  }

  public function searchBookByTitle($title)
  {
    $dataBase = new Database();
    $books = $dataBase->Books;

    foreach ($books as $index => $book) {
      if ($book->getTitle() == $title) {
        return $books[$index];
        break;
      }
    }

    echo "\nNo book found with ID: $title\n\n";
  }

  public function searchBookByISBN($ISBN)
  {
    $dataBase = new Database();
    $books = $dataBase->Books;

    foreach ($books as $index => $book) {
      if ($book->getISBN() == $ISBN) {
        return $books[$index];
        break;
      }
    }

    echo "\nNo book found with ID: $ISBN\n\n";
  }

  public function addBook($book)
  {
    $dataBase = new DataBase();
    $dataBase->Books[] = $book;
    $dataBase->saveData();
  }

  public function editBook($id, $editedBook)
  {
    $dataBase = new Database();
    $books = $dataBase->Books;
    $bookFound = false;

    foreach ($books as $index => $book) {
      if ($book->getId() == $id) {
        $books[$index] = $editedBook;
        $bookFound = true;
        echo "\nBook edited successfully\n\n";
        break;
      }
    }

    if (!$bookFound) {
      echo "\nNo book found with ID: $id\n\n";
    } else {
      $dataBase->Books = $books;
      $dataBase->saveData();
    }
  }

  public function deleteBook($id)
  {
    $dataBase = new DataBase();
    $books = $dataBase->Books;
    $bookFound = false;

    foreach ($books as $index => $book) {
      if ($book->getId() == $id) {
        unset($books[$index]);
        $bookFound = true;
        echo "\nBook deleted successfully\n\n";
        break;
      }
    }

    if (!$bookFound) {
      echo "\nNo book found with ID: $id\n\n";
    } else {
      $dataBase->Books = array_values($books);
      $dataBase->saveData();
    }
  }
}
