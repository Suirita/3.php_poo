<?php
require("../Services/BookService.php");
require("../Entities/Book.php");

class BookPresentation
{
  public function viewBooks()
  {
    echo "\nViewing the list of Books\n";

    $bookService = new BookService();
    $books = $bookService->getBooks();

    if (!empty($books["Books"])) {
      foreach ($books["Books"] as $book) {
        echo "---------------------------------\n";
        echo "ISBN: " . $book['ISBN'] . "\n";
        echo "Title: " . $book['title'] . "\n";
        echo "Publish Date: " . $book['publish_date'] . "\n";
        echo "Author: " . $book['author'] . "\n";
      }
      echo "---------------------------------\n\n";
    } else {
      echo "\nNo Book available.\n\n";
    }
  }

  public function addBook()
  {
    echo "\nAdding a new Book\n";
    $ISBN = askQuestion("Enter the ISBN of the book (or type 'back' to go back): ");
    if (strtolower($ISBN) === "back") {
      return;
    }

    $title = askQuestion("Enter the Title of the book (or type 'back' to go back): ");
    if (strtolower($title) === "back") {
      return;
    }

    $publish_date = askQuestion("Enter the Publish Date of the book (or type 'back' to go back): ");
    if (strtolower($publish_date) === "back") {
      return;
    }

    $author = askQuestion("Enter the Author of the book (or type 'back' to go back): ");
    if (strtolower($author) === "back") {
      return;
    }

    $new_book = new Book($ISBN, $title, $publish_date, $author);
    $bookService = new BookService;
    $bookService->setBook($new_book);
    echo "\nBook added successfully\n\n";
  }
}
