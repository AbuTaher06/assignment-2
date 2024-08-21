<?php
class Book {

    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies) {
       
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    
    public function getTitle() {
        return $this->title;
    }

    // Get available copies method
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Borrow book method
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        }
        return false;
    }

    // Return book method
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // Get name method
    public function getName() {
        return $this->name;
    }

    // Borrow book method
    public function borrowBook(Book $book) {
        if ($book->borrowBook()) {
            echo $this->name . " borrowed '" . $book->getTitle() . "'.\n";
        } else {
            echo $this->name . " could not borrow '" . $book->getTitle() . "' (no copies available).\n";
        }
    }

    // Return book method
    public function returnBook(Book $book) {
        $book->returnBook();
        echo $this->name . " returned '" . $book->getTitle() . "'.\n";
    }
}


// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Members borrow books
$member1->borrowBook($book1); // John Doe borrows The Great Gatsby
$member2->borrowBook($book2); // Jane Smith borrows To Kill a Mockingbird

// Print available copies
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "\n";
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "\n";

?>
