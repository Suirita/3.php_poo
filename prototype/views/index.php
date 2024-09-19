<?php
require("../controllers/BookController.php");

function askQuestion($question)
{
  echo $question;
  return trim(fgets(STDIN));
}

function book_management()
{
  echo chr(27) . chr(91) . 'H' . chr(27) . chr(91) . 'J';
  echo "Welcome to the Books List Manager\n\n";

  $exitProgram = false;
  while (!$exitProgram) {
    echo "====================================\n";
    echo "        Books Management        \n";
    echo "====================================\n";
    echo "Please choose an action:\n";
    echo "-----------------------------------\n";
    echo " [v] - View the list of Books\n";
    echo " [a] - Add a new Book\n";
    echo " [exit] - Exit the program\n";
    echo "-----------------------------------\n\n";

    $action = askQuestion("Your choice: ");
    switch (strtolower($action)) {
      case 'v':
        echo "\nViewing the list of Books\n";
        $book = new Book("ISBN", "title", "author", "publication_date", "availability");
        $books = $book->view_books();
        foreach ($books as $bk) {
          echo "---------------------------------\n";
          echo "ISBN: " . $bk['ISBN'] . "\n";
          echo "Title: " . $bk['title'] . "\n";
          echo "Author: " . $bk['author'] . "\n";
          echo "Publication Date: " . $bk['publication_date'] . "\n";
          echo "Availability: " . ($bk['availability'] ? "Available" : "Not Available") . "\n";
        }
        echo "\n";
        break;

      case 'a':
        echo "\nAdding a new Book\n";
        $ISBN = askQuestion("Enter the ISBN of the book (or type 'back' to go back): ");
        if (strtolower($ISBN) === "back") {
          break;
        }

        $title = askQuestion("Enter the title of the book (or type 'back' to go back): ");
        if (strtolower($title) === "back") {
          break;
        }

        $author = askQuestion("Enter the author of the book (or type 'back' to go back): ");
        if (strtolower($author) === "back") {
          break;
        }

        $publication_date = askQuestion("Enter the publication date of the book (or type 'back' to go back): ");
        if (strtolower($publication_date) === "back") {
          break;
        }
        echo "\n";

        $availability = true;

        $new_book = new Book($ISBN, $title, $author, $publication_date, $availability);
        echo $new_book->add_book($new_book) . "\n \n";
        break;

      case 'exit':
        $exitProgram = true;
        break;

      default:
        echo "Invalid choice. Please try again.\n";
        break;
    }
  }
  echo "Exiting the program. Goodbye!\n";
}

book_management();
