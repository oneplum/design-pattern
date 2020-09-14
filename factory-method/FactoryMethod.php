<?php

abstract class Product {
}

class ConcreteProduct extends Product {
}

class Creator {
    abstract public function factoryMethod();
}

class ConcreteCreator extends Creator {
    public function factoryMethod() {
        return new ConcreteProduct();
    }
}
