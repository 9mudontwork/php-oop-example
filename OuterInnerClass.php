<?php

class OuterClass {
  private $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function forkInnerObject($name) {
    $class = new ReflectionClass('InnerClass');
    $constructor = $class->getConstructor();
    $constructor->setAccessible(true);
    $innerObject = $class->newInstanceWithoutConstructor(); // This method appeared in PHP 5.4
    $constructor->invoke($innerObject, $this, $name);
    return $innerObject;
  }
}

class InnerClass {
  private $parentObject;
  private $name;

  private function __construct(OuterClass $parentObject, $name) {
    $this->parentObject = $parentObject;
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function getParent() {
    return $this->parentObject;
  }
}

$outerObject = new OuterClass('This is an outer object');
//$innerObject = new InnerClass($outerObject, 'You cannot do it');
$innerObject = $outerObject->forkInnerObject('This is an inner object');
echo $innerObject->getName() . "\n";
echo $innerObject->getParent()->getName() . "\n";

?>