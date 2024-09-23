<?php
require("../DataAccess/BorrowingDAO.php");

class BorrowingService
{
  public function getBorrowings()
  {
    $borrowingDAO = new BorrowingDAO();
    return $borrowingDAO->getBorrowings();
  }

  public function setBorrowing($borrowing)
  {
    $new_borrowing = [
      'id' => $borrowing->getId(),
      'start_date' => $borrowing->getStart_date(),
      'expected_return_date' => $borrowing->getExpected_return_date(),
      'actual_return_date' => $borrowing->getActual_return_date(),
      'book' => $borrowing->getBook(),
      'reader' => $borrowing->getReader()
    ];

    $borrowingDAO = new BorrowingDAO();
    $borrowingDAO->setBorrowing($new_borrowing);
  }
}
