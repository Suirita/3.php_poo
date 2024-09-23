<?php
require("../Services/AuthorService.php");
require("../Entities/Author.php");

class AuthorPresentation
{
  public function viewAuthors()
  {
    echo "\nViewing the list of Authors\n";

    $authorService = new AuthorService();
    $authors = $authorService->getAuthors();

    if (!empty($authors["Authors"])) {
      foreach ($authors["Authors"] as $author) {
        echo "---------------------------------\n";
        echo "First Name: " . $author['first_name'] . "\n";
        echo "Last Name: " . $author['last_name'] . "\n";
        echo "Nationality: " . $author['nationality'] . "\n";
      }
      echo "---------------------------------\n\n";
    } else {
      echo "\nNo Author available.\n\n";
    }
  }

  public function addAuthor()
  {
    echo "\nAdding a new Author\n";
    $first_name = askQuestion("Enter the First Name of the Author (or type 'back' to go back): ");
    if (strtolower($first_name) === "back") {
      return;
    }

    $last_name = askQuestion("Enter the Last Name of the book (or type 'back' to go back): ");
    if (strtolower($last_name) === "back") {
      return;
    }

    $nationality = askQuestion("Enter the Nationality of the book (or type 'back' to go back): ");
    if (strtolower($nationality) === "back") {
      return;
    }

    $new_author = new Author($first_name, $last_name, $nationality);
    $authorService = new AuthorService;
    $authorService->setAuthor($new_author);
    echo "Author added successfully\n\n";
  }
}
