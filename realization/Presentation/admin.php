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
    echo "| [va] - View Available Books        |\n";
    echo "| [s] - Search the Books             |\n";
    echo "| [a] - Add a new Book               |\n";
    echo "| [e] - Edit a Book                  |\n";
    echo "| [d] - Delete a Book                |\n";
    echo "| [b] - Borrowings a Book            |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n";
    $action = askQuestion("Your choice: ");
    echo "--------------------------------------\n";

    $bookPresentation = new BookPresentation();
    switch (strtolower($action)) {
      case 'v':
        $bookPresentation->viewBooks();
        break;

      case 'va':
        $bookPresentation->viewAvailableBooks();
        break;

      case 's':
        $bookPresentation->searchBook();
        break;

      case 'a':
        $bookPresentation->addBook();
        break;

      case 'e':
        $bookPresentation->editBook();
        break;

      case 'd':
        $bookPresentation->deleteBook();
        break;

      case 'b':
        borrowing_management();
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
    echo "| [e] - Edit an Authors              |\n";
    echo "| [d] - Deleting a Authors           |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n";
    $action = askQuestion("Your choice: ");
    echo "--------------------------------------\n";

    $authorPresentation = new AuthorPresentation();
    switch (strtolower($action)) {
      case 'v':
        $authorPresentation->viewAuthors();
        break;

      case 'a':
        $authorPresentation->addAuthor();
        break;

      case 'e':
        $authorPresentation->editAuthor();
        break;

      case 'd':
        $authorPresentation->deleteAuthor();
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
    echo "| [e] - Edit a Reader                |\n";
    echo "| [d] - Delete a Readers             |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n";
    $action = askQuestion("Your choice: ");
    echo "--------------------------------------\n";

    $readerPresentation = new ReaderPresentation();
    switch (strtolower($action)) {
      case 'v':
        $readerPresentation->viewReaders();
        break;

      case 'a':
        $readerPresentation->addReader();
        break;

      case 'e':
        $readerPresentation->editReader();
        break;

      case 'd':
        $readerPresentation->deleteReader();
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
    echo "| [e] - Edit a Borrowings            |\n";
    echo "| [d] - Delete a Borrowings          |\n";
    echo "| [back] - back to main menu         |\n";
    echo "+------------------------------------+\n";
    $action = askQuestion("Your choice: ");
    echo "--------------------------------------\n";

    $borrowingPresentation = new BorrowingPresentation();
    switch (strtolower($action)) {
      case 'v':
        $borrowingPresentation->viewBorrowings();
        break;

      case 'a':
        $borrowingPresentation->addBorrowing();
        break;

      case 'e':
        $borrowingPresentation->editBorrowing();
        break;

      case 'd':
        $borrowingPresentation->deleteBorrowing();
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
    echo "| [1] - Books management             |\n";
    echo "| [2] - Authors management           |\n";
    echo "| [3] - Readers management           |\n";
    echo "| [exit] - Exit the program          |\n";
    echo "+------------------------------------+\n";

    $action = askQuestion("Your choice: ");
    switch ($action) {
      case '1':
        book_management();
        break;

      case '2':
        author_management();
        break;

      case '3':
        reader_management();
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
