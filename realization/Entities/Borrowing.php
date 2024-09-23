<?php

class Borrowing
{
  private $id;
  private $start_date;
  private $expected_return_date;
  private $actual_return_date;
  private $Book;
  private $reader;

  public function __construct($start_date, $expected_return_date, $actual_return_date, $Book, $reader)
  {
    $this->id = time();
    $this->start_date = $start_date;
    $this->expected_return_date = $expected_return_date;
    $this->actual_return_date = $actual_return_date;
    $this->Book = $Book;
    $this->reader = $reader;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getStart_date()
  {
    return $this->start_date;
  }

  public function setStart_date($start_date)
  {
    $this->start_date = $start_date;
  }

  public function getExpected_return_date()
  {
    return $this->expected_return_date;
  }

  public function setExpected_return_date($expected_return_date)
  {
    $this->expected_return_date = $expected_return_date;
  }

  public function getActual_return_date()
  {
    return $this->actual_return_date;
  }

  public function setActual_return_date($actual_return_date)
  {
    $this->actual_return_date = $actual_return_date;
  }

  public function getBook()
  {
    return $this->Book;
  }

  public function setBook($Book)
  {
    $this->Book = $Book;
  }

  public function getReader()
  {
    return $this->reader;
  }

  public function setReader($reader)
  {
    $this->reader = $reader;
  }
}
