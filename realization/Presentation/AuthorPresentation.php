<?php
require("../Services/AuthorService.php");
require("../Entities/Author.php");

class AuthorPresentation
{
  public function viewAuthors()
  {
    echo "\nViewing the list of Authors\n";

    $authorService = new AuthorService();
    $authors = $authorService->viewAuthors();

    if (!empty($authors)) {
      foreach ($authors as $author) {
        echo "---------------------------------\n";
        echo "ID: " . $author->getId() . "\n";
        echo "First Name: " . $author->getFirst_name() . "\n";
        echo "Last Name: " . $author->getLast_name() . "\n";
        echo "Nationality: " . $author->getNationality() . "\n";
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

    $last_name = askQuestion("Enter the Last Name of the author (or type 'back' to go back): ");
    if (strtolower($last_name) === "back") {
      return;
    }

    $nationality = askQuestion("Enter the Nationality of the author (or type 'back' to go back): ");
    if (strtolower($nationality) === "back") {
      return;
    }

    $new_author = new Author($first_name, $last_name, $nationality);
    $authorService = new AuthorService;
    $authorService->addAuthor($new_author);
    echo "Author added successfully\n\n";
  }

  public function editAuthor()
  {
    echo "\Editing a Author\n";
    $id = askQuestion("Enter the ID of the author (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $new_first_name = askQuestion("Enter the new First Name of the author (or type 'back' to go back): ");
    if (strtolower($new_first_name) === "back") {
      return;
    }

    $new_last_name = askQuestion("Enter the new Last Name of the author (or type 'back' to go back): ");
    if (strtolower($new_last_name) === "back") {
      return;
    }

    $new_nationality = askQuestion("Enter the new Nationality of the author (or type 'back' to go back): ");
    if (strtolower($new_nationality) === "back") {
      return;
    }

    $editedAuthor = new Author($new_first_name, $new_last_name, $new_nationality);
    $authorService = new AuthorService;
    $authorService->editAuthor($id, $editedAuthor);
  }

  public function deleteAuthor()
  {
    echo "\nDeleting a Author\n";
    $id = askQuestion("Enter Id of the author (or type 'back' to go back): ");
    if (strtolower($id) === "back") {
      return;
    }

    $authorService = new AuthorService;
    $authorService->deleteAuthor($id);
  }
}
