<?php

class Reader
{
  private $id;
  private $card_number;
  private $first_name;
  private $last_name;
  private $address;

  public function __construct($card_number, $first_name, $last_name, $address)
  {
    $this->id = time();
    $this->card_number = $card_number;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->address = $address;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getCard_number()
  {
    return $this->card_number;
  }

  public function setCard_number($card_number)
  {
    $this->card_number = $card_number;
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

  public function getAddress()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
  }
}
