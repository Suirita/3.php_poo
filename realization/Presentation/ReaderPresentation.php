<?php
require("../Services/ReaderService.php");
require("../Entities/Reader.php");

class ReaderPresentation
{
  public function viewReaders()
  {
    echo "\nViewing the Readers\n";

    $readerService = new ReaderService();
    $readers = $readerService->viewReaders();

    if (!empty($readers)) {
      foreach ($readers as $reader) {
        echo "---------------------------------\n";
        echo "ID: " . $reader->getId() . "\n";
        echo "Card Number: " . $reader->getCard_number() . "\n";
        echo "First Name: " . $reader->getFirst_name() . "\n";
        echo "Last Name: " . $reader->getLast_name() . "\n";
        echo "Address: " . $reader->getAddress() . "\n";
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
    $readerService->addReader($new_reader);
    echo "Reader added successfully\n\n";
  }

  public function editReader()
  {
    echo "\Editing a Reader\n";
    $id = askQuestion("Enter the ID of the reader (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $new_card_number = askQuestion("Enter the new Card Number of the reader (or type 'back' to go back): ");
    if (strtolower($new_card_number) === "back") {
      return;
    }

    $new_first_name = askQuestion("Enter the new First Name of the reader (or type 'back' to go back): ");
    if (strtolower($new_first_name) === "back") {
      return;
    }

    $new_last_name = askQuestion("Enter the new Last Name of the reader (or type 'back' to go back): ");
    if (strtolower($new_last_name) === "back") {
      return;
    }

    $new_address = askQuestion("Enter the new Address of the reader (or type 'back' to go back): ");
    if (strtolower($new_address) === "back") {
      return;
    }

    $editedReader = new Reader($new_card_number, $new_first_name, $new_last_name, $new_address);
    $readerService = new ReaderService;
    $readerService->editReader($id, $editedReader);
  }

  public function deleteReader()
  {
    echo "\nDeleting a Reader\n";
    $id = askQuestion("Enter ID of the reader (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $readerService = new ReaderService;
    $readerService->deleteReader($id);
  }
}
