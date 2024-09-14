<?php
// One to One
class Person
{
  private $id;
  private $nam;
  private $passport;

  public function setPassport(Passport $passport): void
  {
    $this->passport = $passport;
    $passport->setPerson($this);
  }
}

class Passport
{
  private $numero;
  private $dateExpiration;
  private $person; // Un objet Person

  public function setPerson(Person $person): void
  {
    $this->person = $person;
  }
}

// One to Many
class Author
{
  private $id;
  private $name;
  /** @var Book[] */
  private $books = [];

  public function addBook(Book $book): void
  {
    $this->books[] = $book;
    $book->setAuthor($this);
  }
}

class Book
{
  private $id;
  private $titre;
  private $author;
}

// Many-to-Many
class Student
{
  private $id;
  private $name;
  /** @var Course[] */
  private $course = [];

  // ... getters et setters ...

  public function addCourse(Course $course): void
  {
    $this->course[] = $course;
    $course->addStudent($this);
  }
}

class Course
{
  private $id;
  private $name;
  /** @var Student[] */
  private $students = [];

  // ... getters et setters ...

  public function addStudent(Student $student): void
  {
    $this->students[] = $student;
  }
}

// Using an ORM
// Configuration de Doctrine (simplified)
use Doctrine\ORM\EntityManager;

$entityManager = EntityManager::create(/* ... parameters de connection ... */);

// Creation d'un new author et de books associates
$author = new Author();
$author->setName('Dumas');

$book1 = new Book();
$book1->setTitre('the three Musketeers');
$book1->setAuthor($author);

$entityManager->persist($author);
$entityManager->persist($book1);
$entityManager->flush();
