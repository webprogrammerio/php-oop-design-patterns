<?php
// PHP OOP Builder Design Pattern

// Concrete Class
class HomeConcrete
{
  public $bedrooms;
  public $type;
  const APARTMENT = "Apartment";
  const SINGLE_FAMILY = "Single Family";
  public function __construct()
  {
  }
}

// Builder Interface
interface HomeBuilderInterface
{
  public function setType();
  public function setBedroomsCount();
  public function getHome();
}

// Builder Implementation
class ApartmentBuilder implements HomeBuilderInterface
{
  private $home;
  public function __construct(HomeConcrete $home)
  {
    $this->home = $home;
  }
  public function setType()
  {
    $this->home->type = HomeConcrete::APARTMENT;
  }
  public function setBedroomsCount()
  {
    $this->home->bedroom = 2;
  }
  public function getHome()
  {
    return $this->home;
  }
}

// Builder Implementation
class SingleFamilyBuilder implements HomeBuilderInterface
{
  private $home;
  public function __construct(HomeConcrete $home)
  {
    $this->home = $home;
  }
  public function setType()
  {
    $this->home->type = HomeConcrete::SINGLE_FAMILY;
  }
  public function setBedroomsCount()
  {
    $this->home->bedroom = 4;
  }
  public function getHome()
  {
    return $this->home;
  }
}

// Builder Director
class HomeDirector
{
  public function build(HomeBuilderInterface $builder)
  {
    $builder->settype();
    $builder->setBedroomsCount();
    return $builder->getHome();
  }
}

// Use the builder
$apartment_home = (new HomeDirector())->build(
  new ApartmentBuilder(new HomeConcrete())
);
$single_family_home = (new HomeDirector())->build(
  new SingleFamilyBuilder(new HomeConcrete())
);

print_r($apartment_home);
print_r($single_family_home);
