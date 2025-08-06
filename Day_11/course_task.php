<?php

class Course {
    private $instructorName;
    private $courseTitle;

    
    public function __construct($instructorName, $courseTitle) {
        $this->instructorName = $instructorName;
        $this->courseTitle = $courseTitle;
    }

    
    public function describe() {
        echo "Course Title: " . $this->courseTitle . "<br>";
        echo "Instructor: " . $this->instructorName . "<br>";
    }
}


$course1 = new Course("Eng. Ahmed", "PHP for Beginners");
$course1->describe();

?>
