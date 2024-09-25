<?php
require("../Services/BookService.php");
require("../Entities/Book.php");

class BookPresentation
{
  public function viewBooks()
  {
    echo "\nViewing the list of Books\n";

    $bookService = new BookService();
    $books = $bookService->viewBooks();

    if (!empty($books)) {
      foreach ($books as $book) {
        echo "---------------------------------\n";
        echo "ID: " . $book->getId() . "\n";
        echo "ISBN: " . $book->getISBN() . "\n";
        echo "Title: " . $book->getTitle() . "\n";
        echo "Publish Date: " . $book->getPublish_date() . "\n";
        echo "Author: " . $book->getAuthor() . "\n";
      }
      echo "---------------------------------\n\n";
    } else {
      echo "\nNo Book available.\n\n";
    }
  }

  public function viewAvailableBooks()
  {
    echo "\nViewing the available Books\n";

    $bookService = new BookService();
    $books = $bookService->viewAvailableBooks();

    if (!empty($books)) {
      foreach ($books as $book) {
        echo "---------------------------------\n";
        echo "ID: " . $book->getId() . "\n";
        echo "ISBN: " . $book->getISBN() . "\n";
        echo "Title: " . $book->getTitle() . "\n";
        echo "Publish Date: " . $book->getPublish_date() . "\n";
        echo "Author: " . $book->getAuthor() . "\n";
      }
      echo "---------------------------------\n\n";
    } else {
      echo "\nNo Book available.\n\n";
    }
  }

  public function viewAvailableBooksWeb()
  {
    echo "\nViewing the available Books\n";

    $bookService = new BookService();
    $books = $bookService->viewAvailableBooks();

    if (!empty($books)) {
      foreach ($books as $book) {
        echo "ID: " . $book->getId() . "\n";
        echo "ISBN: " . $book->getISBN() . "\n";
        echo "Title: " . $book->getTitle() . "\n";
        echo "Publish Date: " . $book->getPublish_date() . "\n";
        echo "Author: " . $book->getAuthor() . "\n";
      }
    } else {
      echo "\nNo Book available.\n\n";
    }
  }

  public function searchBook()
  {
    echo "\nBook Searching\n";

    $exitSearching = false;
    while (!$exitSearching) {
      $action = askQuestion("Search by 'ISBN' or 'title' (or type 'back' to go back): ");
      switch (strtolower($action)) {
        case "title":
          $exitSearching = true;
          $title = askQuestion("Enter the Title of the book (or type 'back' to go back): ");
          if (strtolower($title) === "back") {
            return;
          }

          $bookService = new BookService();
          $book = $bookService->searchBookByTitle($title);
          break;
        case "isbn":
          $exitSearching = true;
          $ISBN = askQuestion("Enter the ISBN of the book (or type 'back' to go back): ");
          if (strtolower($ISBN) === "back") {
            return;
          }

          $bookService = new BookService();
          $book = $bookService->searchBookByISBN($ISBN);
          break;
        case 'back':
          $exitSearching = true;
          break;

        default:
          echo "\nInvalid choice. Please try again.\n\n";
          break;
      }
    }

    if (!empty($book)) {
      echo "---------------------------------\n";
      echo "ID: " . $book->getId() . "\n";
      echo "ISBN: " . $book->getISBN() . "\n";
      echo "Title: " . $book->getTitle() . "\n";
      echo "Publish Date: " . $book->getPublish_date() . "\n";
      echo "Author: " . $book->getAuthor() . "\n";
      echo "---------------------------------\n\n";
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
    $bookService->addBook($new_book);

    echo "\nBook added successfully\n\n";
  }

  public function editBook()
  {
    echo "\Editing a Book\n";
    $id = askQuestion("Enter the ID of the book (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $new_ISBN = askQuestion("Enter the new ISBN of the book (or type 'back' to go back): ");
    if (strtolower($new_ISBN) === "back") {
      return;
    }

    $new_title = askQuestion("Enter the new Title of the book (or type 'back' to go back): ");
    if (strtolower($new_title) === "back") {
      return;
    }

    $new_publish_date = askQuestion("Enter the new Publish Date of the book (or type 'back' to go back): ");
    if (strtolower($new_publish_date) === "back") {
      return;
    }

    $new_author = askQuestion("Enter the new Author of the book (or type 'back' to go back): ");
    if (strtolower($new_author) === "back") {
      return;
    }

    $editedBook = new Book($new_ISBN, $new_title, $new_publish_date, $new_author);
    $bookService = new BookService;
    $bookService->editBook($id, $editedBook);
  }

  public function deleteBook()
  {
    echo "\nDeleting a Book\n";
    $id = askQuestion("Enter the ID of the book (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $bookService = new BookService;
    $bookService->deleteBook($id);
  }
}
