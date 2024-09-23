<?php
require("../Services/BorrowingService.php");
require("../Entities/Borrowing.php");

class BorrowingPresentation
{
  public function viewBorrowings()
  {
    echo "\nViewing the Borrowings\n";

    $borrowingService = new BorrowingService();
    $borrowings = $borrowingService->getBorrowings();

    if (!empty($borrowings["Borrowings"])) {
      foreach ($borrowings["Borrowings"] as $borrowing) {
        echo "---------------------------------\n";
        echo "Start Date: " . $borrowing['start_date'] . "\n";
        echo "Expected Return Date: " . $borrowing['expected_return_date'] . "\n";
        echo "Actual Return Date: " . $borrowing['actual_return_date'] . "\n";
        echo "Book: " . $borrowing['book'] . "\n";
        echo "reader: " . $borrowing['reader'] . "\n";
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
    $borrowingService->setBorrowing($new_borrowing);
    echo "Borrowing added successfully\n\n";
  }
}
