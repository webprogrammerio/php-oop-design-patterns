<?php
// PHP OOP Factory Method Design Pattern

class Soup
{
  private $name;
  private $beans;
  private $meat;

  public function __construct($name, $beans, $meat)
  {
    $this->name = $name;
    $this->beans = $beans;
    $this->meat = $meat;
  }

  public function getIngredients()
  {
    return $this->name . " has " . $this->beans . " and " . $this->meat;
  }
}

class SoupFactory
{
  public static function create($name)
  {
    if ($name == "chili") {
      return new Soup($name, "pinto beans", "hamburger");
    } else {
      return new Soup($name, "no beans", "chicken");
    }
  }
}

$chili = SoupFactory::create("chili");

echo $chili->getIngredients();
