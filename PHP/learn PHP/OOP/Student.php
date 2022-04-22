<?php

class Student {
    public $name = 'Trần Quang Long';

    protected $age = 18;

    private $address = 'Hanoi, Vietnam';

    const gender = 'male';

    public function getAge() {
        return "Age: " . $this->age;
    }

    public function getGender() {
        return self::gender;
    }
}
?>
<?php 
