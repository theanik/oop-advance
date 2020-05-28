<?php

// Base interface
interface BaseStudent{
    function displayName();
}

class Student implements BaseStudent
{
    private $name;
    public function setName($name)
    {
        $this->name = $name;
    }

    public function displayName()
    {
        echo "This is {$this->name} \n";
    }
}

class StudentDetails implements BaseStudent
{
    private $name, $roll;
    public function __construct($name, $roll)
    {
        $this->name = $name;
        $this->roll = $roll;
    }

    public function displayName()
    {
        echo "This is {$this->name} and his roll is {$this->roll}\n";
    }
}

/*

- this is bad practice


class ClassRepresentator
{
    public function introduseStudent($name)
    {
        $student = new Student(); // this object pass here as a hard code
        $student->setName($name);
        $student->displayName();
    }
}

$cr = new ClassRepresentator();
$cr->introduseStudent("Rahim");

/*


/*
Batter approach  in dependency injection design
*/

class ClassRepresntator
{
    function introduseStudent(BaseStudent $student)
    {
        $student->displayName();
    }
}

$rahim = new Student();
$rahim->setName("Rahim");

$Jhon = new Student();
$Jhon->setName("Jhon");

$cr = new ClassRepresntator();
$cr->introduseStudent($rahim);
$cr->introduseStudent($Jhon);


/*
here the benefit of dependency injection i want to use any or object which is instance of base class, i haven't need to change in ClassRepresentator. 
we can simply pass the object as a dependency in ClassRepresentator object.
*/


$anik = new StudentDetails("Anik", 01);
$cr->introduseStudent($anik); // cool