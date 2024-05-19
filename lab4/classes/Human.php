<?php
namespace classes;
require_once 'interfaces/CleaningHouse.php';
use interfaces\CleaningHouse;

abstract class Human implements CleaningHouse {
    private $height;
    private $weight;
    private $age;

    public function __construct($height, $weight, $age) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function setAge($age) {
        $this->age = $age;
    }


    protected function giveBirth() {
        $this->notifyChildbirth();
    }
    abstract protected function notifyChildbirth();

    
}