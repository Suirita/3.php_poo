<?php
require("../models/BookModel.php");

class Book
{
  private $ISBN;
  private $title;
  private $author;
  private $publication_date;
  private $availability;

  public function __construct($ISBN, $title, $author, $publication_date, $availability)
  {
    $this->ISBN = $ISBN;
    $this->title = $title;
    $this->author = $author;
    $this->publication_date = $publication_date;
    $this->availability = $availability;
  }

  public function view_books()
  {
    $book_model = new Model_Book();
    $books = $book_model->retrieve_books();
    return $books;
  }

  public function add_book(Book $book)
  {
    $book_model = new Model_Book();
    $book_model->store_book($book);
    return "Book added successfully";
  }

  public function getISBN()
  {
    return $this->ISBN;
  }

  public function setISBN($ISBN)
  {
    $this->ISBN = $ISBN;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function getPublicationDate()
  {
    return $this->publication_date;
  }

  public function setPublicationDate($publication_date)
  {
    $this->publication_date = $publication_date;
  }

  public function getAvailability()
  {
    return $this->availability;
  }

  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
}
