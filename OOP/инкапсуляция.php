<?php 

class Cat
{
    private $name;
    private $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello() 
    {
        echo 'Привет! Меня зовут '. $this->name . '. Я ' .$this->color. ' цвета.';
    }

    public function setName(string $name) 
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setColor(string $color) 
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}

$cat = new Cat('Мурка', 'пятнистого');

echo $cat->sayHello();

?>