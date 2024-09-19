<?php
class Model_Book
{
  public function store_book($book)
  {
    $file_path = "../DB/Books.json";
    $books = [];

    if (file_exists($file_path)) {
      $json = file_get_contents($file_path);
      $books = json_decode($json, true);
    }


    $book_data = [
      'ISBN' => $book->getISBN(),
      'title' => $book->getTitle(),
      'author' => $book->getAuthor(),
      'publication_date' => $book->getPublicationDate(),
      'availability' => $book->getAvailability()
    ];

    $books[] = $book_data;
    $json = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents($file_path, $json);
  }



  public function retrieve_books()
  {
    $file_path = "../DB/Books.json";

    if (file_exists($file_path)) {
      $json = file_get_contents($file_path);
      $books = json_decode($json, true);
      return $books;
    }

    return [];
  }
}
