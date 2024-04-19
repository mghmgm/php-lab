<?php 

abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract
{
    public function __construct(string $name) 
    {
        parent::__construct($name);
    }

    public function getGreetings(): string 
    {
        return 'Привет!';
    }

    public function getMyNameIs(): string 
    {
        return 'Меня зовут ' .$this->getName(). '.';
    }
}

class EnglishHuman extends HumanAbstract
{
    public function __construct(string $name) 
    {
        parent::__construct($name);
    }

    public function getGreetings(): string 
    {
        return 'Hello!';
    }

    public function getMyNameIs(): string 
    {
        return 'My name is ' .$this->getName(). '.';
    }
}

$person1 = new RussianHuman('Олег');
$person2 = new EnglishHuman('Tom');

echo $person1->getGreetings() .' '. $person1->getMyNameIs();
echo '<br>';
echo $person2->getGreetings() .' '. $person2->getMyNameIs();

?>
