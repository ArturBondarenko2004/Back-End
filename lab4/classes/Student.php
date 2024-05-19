<?php
namespace classes;
class Student extends Human {
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    public function getUniversity() {
        return $this->university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function promoteToNextCourse() {
        $this->course++;
        echo "Студента переведено на: " . $this->course . " курс\n";
    }

    protected function notifyChildbirth() {
        echo "Студент  народив";
    }
    public function performBirth() {
        $this->giveBirth();
    }
    public function CleaningRoom()
    {
        echo "Студент прибирає кімнату";
    }
    public function CleaningKitchen()
    {
        echo "Студент прибирає кухню";
    }

 
}