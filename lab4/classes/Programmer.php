<?php

namespace classes;
class Programmer extends Human
{
    private $programmingLanguages;
    private $workExperience;

    public function __construct($height, $weight, $age, $programmingLanguages, $workExperience)
    {
        parent::__construct($height, $weight, $age);
        $this->programmingLanguages = $programmingLanguages;
        $this->workExperience = $workExperience;
    }

    public function getProgrammingLanguages()
    {
        return $this->programmingLanguages;
    }

    public function getWorkExperience()
    {
        return $this->workExperience;
    }

    public function setProgrammingLanguages($programmingLanguages)
    {
        $this->programmingLanguages = $programmingLanguages;
    }

    public function setWorkExperience($workExperience)
    {
        $this->workExperience = $workExperience;
    }

    public function addProgrammingLanguage($language)
    {
        $this->programmingLanguages[] = $language;
    }

    protected function notifyChildbirth()
    {
        echo "Програміст народив";
    }
    public function performBirth()
    {
        $this->giveBirth();
    }
    public function CleaningRoom()
    {
        echo "Програміст прибирає кімнату";
    }
    public function CleaningKitchen()
    {
        echo "Програміст прибирає кухню";
    }
}
