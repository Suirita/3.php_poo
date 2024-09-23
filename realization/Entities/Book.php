<?php

class Book
{
  private $id;
  private $ISBN;
  private $title;
  private $publish_date;
  private $author;

  public function __construct($ISBN, $title, $publish_date, $author)
  {
    $this->id = time();
    $this->ISBN = $ISBN;
    $this->title = $title;
    $this->publish_date = $publish_date;
    $this->author = $author;
  }

  public function getId()
  {
    return $this->id;
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

  public function getPublish_date()
  {
    return $this->publish_date;
  }

  public function setPublish_date($publish_date)
  {
    $this->publish_date = $publish_date;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function setAuthor($author)
  {
    $this->author = $author;
  }
}
