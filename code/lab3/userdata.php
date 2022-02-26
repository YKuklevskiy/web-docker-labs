<?php 

class UserData {
    private string $name;
    private int $age;
    private int $salary;
    private string $something;

    public function __construct(string $name, int $age, int $salary, string $something) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->something = $something;
    }

    function __equals(UserData $object)
    {
        return ($this->name == $object->name && 
            $this->age == $object->age &&
            $this->salary == $object->salary
        );
    }

    public function getUserInfo(): array
    {
        return array
        (
            "name" => $this->name,
            "age" => $this->age,
            "salary" => $this->salary,
            "something" => $this->something
        );
    }
}

?>