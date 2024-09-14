<?php
class Animal
{
  public $name;
  public $age;

  public function eat()
  {
    echo "I'm eating.";
  }
}

class Cat extends Animal
{
  public $breed;

  public function __construct($nom, $age, $breed)
  {
    parent::__construct($nom, $age);
    $this->breed = $breed;
  }

  public function meow()
  {
    echo "Miaou !";
  }
}

class Dog extends Animal
{
  public function makeNoise()
  {
    echo "Ouaf !";
  }
}
