<?php

require("../Services/BorrowingService.php");
require("../Entities/Borrowing.php");

class BorrowingPresentation
{
  public function viewBorrowings()
  {
    echo "\nViewing the Borrowings\n";

    $borrowingService = new BorrowingService();
    $borrowings = $borrowingService->viewBorrowings();

    if (!empty($borrowings)) {
      foreach ($borrowings as $borrowing) {
        echo "---------------------------------\n";
        echo "ID: " . $borrowing->getId() . "\n";
        echo "Start Date: " . $borrowing->getStart_date() . "\n";
        echo "Expected Return Date: " . $borrowing->getExpected_return_date() . "\n";
        echo "Actual Return Date: " . $borrowing->getActual_return_date() . "\n";
        echo "Book: " . $borrowing->getBook() . "\n";
        echo "reader: " . $borrowing->getReader() . "\n";
      }
      echo "---------------------------------\n\n";
    } else {
      echo "\nNo borrowings available.\n\n";
    }
  }

  public function addBorrowing()
  {
    echo "\nAdding a new Borrowing\n";
    $start_date = askQuestion("Enter the Start Date of the borrowing (or type 'back' to go back): ");
    if (strtolower($start_date) === "back") {
      return;
    }

    $expected_return_date = askQuestion("Enter the Expected Return Date of the borrowing (or type 'back' to go back): ");
    if (strtolower($expected_return_date) === "back") {
      return;
    }

    $actual_return_date = askQuestion("Enter the Actual Return Date of the borrowing (or type 'back' to go back): ");
    if (strtolower($actual_return_date) === "back") {
      return;
    }

    $book = askQuestion("Enter the Book of the borrowing (or type 'back' to go back): ");
    if (strtolower($book) === "back") {
      return;
    }

    $reader = askQuestion("Enter the Reader of the borrowing (or type 'back' to go back): ");
    if (strtolower($reader) === "back") {
      return;
    }

    $new_borrowing = new Borrowing($start_date, $expected_return_date, $actual_return_date, $book, $reader);
    $borrowingService = new BorrowingService;
    $borrowingService->addBorrowing($new_borrowing);
    echo "Borrowing added successfully\n\n";
  }

  public function editBorrowing()
  {
    echo "\Editing a Borrowing\n";
    $id = askQuestion("Enter the ID of the borrowing (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $new_start_date = askQuestion("Enter the new Start Date of the borrowing (or type 'back' to go back): ");
    if (strtolower($new_start_date) === "back") {
      return;
    }

    $new_expected_return_date = askQuestion("Enter the new Expected Return Date of the borrowing (or type 'back' to go back): ");
    if (strtolower($new_expected_return_date) === "back") {
      return;
    }

    $new_actual_return_date = askQuestion("Enter the new Actual Return Date of the borrowing (or type 'back' to go back): ");
    if (strtolower($new_actual_return_date) === "back") {
      return;
    }

    $new_book = askQuestion("Enter the new Book of the borrowing (or type 'back' to go back): ");
    if (strtolower($new_book) === "back") {
      return;
    }


    $new_reader = askQuestion("Enter the new Reader of the borrowing (or type 'back' to go back): ");
    if (strtolower($new_reader) === "back") {
      return;
    }

    $editedBorrowing = new Borrowing($new_start_date, $new_expected_return_date, $new_actual_return_date, $new_book, $new_reader);
    $borrowingService = new BorrowingService;
    $borrowingService->editBorrowing($id, $editedBorrowing);
  }

  public function deleteBorrowing()
  {
    echo "\nDeleting a Borrowing\n";
    $id = askQuestion("Enter the ID of the borrowing (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $borrowingService = new BorrowingService;
    $borrowingService->deleteBorrowing($id);
  }
}
