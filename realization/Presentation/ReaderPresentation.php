<?php
require("../Services/ReaderService.php");
require("../Entities/Reader.php");

class ReaderPresentation
{
  public function viewReaders()
  {
    echo "\nViewing the Readers\n";

    $readerService = new ReaderService();
    $readers = $readerService->getReaders();

    if (!empty($readers["Readers"])) {
      foreach ($readers["Readers"] as $reader) {
        echo "---------------------------------\n";
        echo "Card Number: " . $reader['card_number'] . "\n";
        echo "First Name: " . $reader['first_name'] . "\n";
        echo "Last Name: " . $reader['last_name'] . "\n";
        echo "Address: " . $reader['address'] . "\n";
      }
      echo "---------------------------------\n\n";
    } else {
      echo "\nNo Readers available.\n\n";
    }
  }

  public function addReader()
  {
    echo "\nAdding a new Reader\n";
    $card_number = askQuestion("Enter the Card Number of the reader (or type 'back' to go back): ");
    if (strtolower($card_number) === "back") {
      return;
    }

    $first_name = askQuestion("Enter the First Name of the reader (or type 'back' to go back): ");
    if (strtolower($first_name) === "back") {
      return;
    }

    $last_name = askQuestion("Enter the Last Name of the reader (or type 'back' to go back): ");
    if (strtolower($last_name) === "back") {
      return;
    }

    $address = askQuestion("Enter the Address of the reader (or type 'back' to go back): ");
    if (strtolower($address) === "back") {
      return;
    }

    $new_reader = new Reader($card_number, $first_name, $last_name, $address);
    $readerService = new ReaderService;
    $readerService->setReader($new_reader);
    echo "Reader added successfully\n\n";
  }
}
