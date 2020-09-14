<?php

class Car {
    protected $model;
}

class CarR extends Car {
    public function __construct() {
        $this->model = 'R';
    }

    public function getModel() {
        return $this->model;
    }
}

class CarT extends Car {
    public function __construct() {
        $this->model = 'T';
    }

    public function getModel() {
        return $this->model;
    }
}

class CarOrder {
    protected $car;
    protected $carOrders = [];

    public function order($model = null) {
        if (strtolower($model) == 't') {
            $this->car = new CarT();
        } else {
            $this->car = new CarR();
        }
        $this->carOrders[] = $this->car->getModel();
    }

    public function getCarOrders() {
        return $this->carOrders;
    }
}

var_dump('common method');
$order = new CarOrder();
$order->order('T');
$order->order('R');
var_dump($order->getCarOrders());

class CarOrderByFactoryMethod {
    protected $car;
    protected $carOrders = [];

    public function order($model = null) {
        $car = $this->make($model);
        $this->carOrders[] = $car->getModel();
    }

    //factory method
    public function make($model = null) {
        if (strtolower($model) == 't') {
            $this->car = new CarT();
        } else {
            $this->car = new CarR();
        }
        return $this->car;
    }

    public function getCarOrders() {
        return $this->carOrders;
    }
}

var_dump('factory method');
$order = new CarOrderByFactoryMethod();
$order->order('T');
$order->order('R');
var_dump($order->getCarOrders());


// facotry method class
class CarFactory {
    public function make($model = null) {
        if (strtolower($model) == 't') {
            $car = new CarT();
        } else {
            $car = new CarR();
        }
        return $car;
    }
}
class CarOrderByFactoryClass {
    protected $carFactory;
    protected $carOrders = [];

    public function __construct() {
        $this->carFactory = new CarFactory();
    }

    public function order($model = null) {
        $car = $this->carFactory->make($model);
        $this->carOrders[] = $car->getModel();
    }

    public function getCarOrders() {
        return $this->carOrders;
    }
}

var_dump('factory method class');
$order = new CarOrderByFactoryClass();
$order->order('T');
$order->order('R');
var_dump($order->getCarOrders());
