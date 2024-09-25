<?php
require_once("../DB/DataBase.php");

class AuthorDAO
{
  public function viewAuthors()
  {
    $dataBase = new DataBase();
    return $dataBase->Authors;
  }

  public function addAuthor($author)
  {
    $dataBase = new DataBase();
    $dataBase->Authors[] = $author;
    $dataBase->saveData();
  }

  public function editAuthor($id, $editedAuthor)
  {
    $dataBase = new Database();
    $authors = $dataBase->Authors;
    $authorFound = false;

    foreach ($authors as $index => $author) {
      if ($author->getId() == $id) {
        $authors[$index] = $editedAuthor;
        $authorFound = true;
        echo "\nAuthor edited successfully\n\n";
        break;
      }
    }

    if (!$authorFound) {
      echo "\nNo author found with ID: $id\n\n";
    } else {
      $dataBase->Authors = $authors;
      $dataBase->saveData();
    }
  }

  public function deleteAuthor($id)
  {
    $dataBase = new DataBase();
    $authors = $dataBase->Authors;
    $authorFound = false;

    foreach ($authors as $index => $author) {
      if ($author->getId() == $id) {
        unset($authors[$index]);
        $authorFound = true;
        echo "\nAuthor deleted successfully\n\n";
        break;
      }
    }

    if (!$authorFound) {
      echo "\nNo author found with ID: $id\n\n";
    } else {
      $dataBase->Authors = array_values($authors);
      $dataBase->saveData();
    }
  }
}
