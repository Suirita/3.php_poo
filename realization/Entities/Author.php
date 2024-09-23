<?php

class Author
{
  private $id;
  private $first_name;
  private $last_name;
  private $nationality;

  public function __construct($first_name, $last_name, $nationality)
  {
    $this->id = time();
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->nationality = $nationality;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getFirst_name()
  {
    return $this->first_name;
  }

  public function setFirst_name($first_name)
  {
    $this->first_name = $first_name;
  }

  public function getLast_name()
  {
    return $this->last_name;
  }

  public function setLast_name($last_name)
  {
    $this->last_name = $last_name;
  }

  public function getNationality()
  {
    return $this->nationality;
  }

  public function setNationality($nationality)
  {
    $this->nationality = $nationality;
  }
}
