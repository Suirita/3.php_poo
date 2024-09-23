<?php
require("./BookPresentation.php");
require("./ReaderPresentation.php");
require("./AuthorPresentation.php");
require("./BorrowingPresentation.php");

function askQuestion($question)
{
  echo $question;
  return trim(fgets(STDIN));
}

function book_management()
{
  $exitProgram = false;
  while (!$exitProgram) {
    echo "+------------------------------------+\n";
    echo "|        Books Management            |\n";
    echo "|------------------------------------|\n";
    echo "|     Please choose an action:       |\n";
    echo "|------------------------------------|\n";
    echo "| [v] - View the Books               |\n";
    echo "| [a] - Add a new Book               |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n\n";

    $action = askQuestion("Your choice: ");
    switch (strtolower($action)) {
      case 'v':
        $bookPresentation = new BookPresentation();
        $bookPresentation->viewBooks();
        break;

      case 'a':
        $bookPresentation = new BookPresentation();
        $bookPresentation->addBook();
        break;

      case 'back':
        $exitProgram = true;
        break;

      default:
        echo "\nInvalid choice. Please try again.\n\n";
        break;
    }
  }
}

function reader_management()
{
  $exitProgram = false;
  while (!$exitProgram) {
    echo "+------------------------------------+\n";
    echo "|        Readers Management          |\n";
    echo "|------------------------------------|\n";
    echo "|     Please choose an action:       |\n";
    echo "|------------------------------------|\n";
    echo "| [v] - View the Readers             |\n";
    echo "| [a] - Add a new Readers            |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n\n";

    $action = askQuestion("Your choice: ");
    switch (strtolower($action)) {
      case 'v':
        $readerPresentation = new ReaderPresentation();
        $readerPresentation->viewReaders();
        break;

      case 'a':
        $readerPresentation = new ReaderPresentation();
        $readerPresentation->addReader();
        break;

      case 'back':
        $exitProgram = true;
        break;

      default:
        echo "\nInvalid choice. Please try again.\n\n";
        break;
    }
  }
}

function author_management()
{
  $exitProgram = false;
  while (!$exitProgram) {
    echo "+------------------------------------+\n";
    echo "|        Authors Management          |\n";
    echo "|------------------------------------|\n";
    echo "|     Please choose an action:       |\n";
    echo "|------------------------------------|\n";
    echo "| [v] - View the Authors             |\n";
    echo "| [a] - Add a new Authors            |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n\n";

    $action = askQuestion("Your choice: ");
    switch (strtolower($action)) {
      case 'v':
        $authorPresentation = new AuthorPresentation();
        $authorPresentation->viewAuthors();
        break;

      case 'a':
        $authorPresentation = new AuthorPresentation();
        $authorPresentation->addAuthor();
        break;

      case 'back':
        $exitProgram = true;
        break;

      default:
        echo "\nInvalid choice. Please try again.\n\n";
        break;
    }
  }
}

function borrowing_management()
{
  $exitProgram = false;
  while (!$exitProgram) {
    echo "+------------------------------------+\n";
    echo "|        Borrowings Management       |\n";
    echo "|------------------------------------|\n";
    echo "|       Please choose an action:     |\n";
    echo "|------------------------------------|\n";
    echo "| [v] - View the Borrowings          |\n";
    echo "| [a] - Add a new Borrowings         |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n\n";

    $action = askQuestion("Your choice: ");
    switch (strtolower($action)) {
      case 'v':
        $borrowingPresentation = new BorrowingPresentation();
        $borrowingPresentation->viewBorrowings();
        break;

      case 'a':
        $borrowingPresentation = new BorrowingPresentation();
        $borrowingPresentation->addBorrowing();
        break;

      case 'back':
        $exitProgram = true;
        break;

      default:
        echo "\nInvalid choice. Please try again.\n\n";
        break;
    }
  }
}

function library_management()
{
  echo chr(27) . chr(91) . 'H' . chr(27) . chr(91) . 'J';
  echo "Welcome to the library Manager\n\n";
  $exitProgram = false;
  while (!$exitProgram) {
    echo "+------------------------------------+\n";
    echo "|        Library Management          |\n";
    echo "|------------------------------------|\n";
    echo "|    Please choose an action:        |\n";
    echo "|------------------------------------|\n";
    echo "| [b] - Books management             |\n";
    echo "| [r] - Readers management           |\n";
    echo "| [a] - Authors management           |\n";
    echo "| [w] - Borrowings management        |\n";
    echo "| [exit] - Exit the program          |\n";
    echo "+------------------------------------+\n\n";

    $action = askQuestion("Your choice: ");
    switch (strtolower($action)) {
      case 'b':
        book_management();
        break;

      case 'r':
        reader_management();
        break;

      case 'a':
        author_management();
        break;

      case 'w':
        borrowing_management();
        break;

      case 'exit':
        $exitProgram = true;
        break;

      default:
        echo "\nInvalid choice. Please try again.\n\n";
        break;
    }
  }
  echo "\nExiting the program. Goodbye!\n";
}

library_management();
