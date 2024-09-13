<?php
class User {
  private $firstName;
  private $lastName;
  private $email;

  public function __construct($firstName, $lastName, $email) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
  }

  public function getFirstName() {
      return $this->firstName;
  }

  public function setLastName($lastName) {
      $this->lastName = $lastName;
  }
}

class BankAccount {
  private $balance;

  public function __construct($balanceInitial) {
      $this->balance = $balanceInitial;
  }

  public function getBalance() {
      return $this->balance;
  }

  public function deposer($montant) {
      if ($montant > 0) {
          $this->balance += $montant;
      } else {
          echo "Le montant doit être positif.";
      }
  }

  public function retirer($montant) {
      if ($montant <= $this->balance) {
          $this->balance -= $montant;
      } else {
          echo "balance insuffisant.";
      }
  }
}
?>
