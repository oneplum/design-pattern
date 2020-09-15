<?php

class Context {
    protected $strategy;

    public function __construct($strategy) {
        $this->setStrategy($strategy);
    }

    public function operator() {
        $this->strategy->algorithm();
    }

    public function setStrategy($strategy) {
        $this->strategy = $strategy;
    }
}

interface Strategy {
    public function algorithm();
}

class Strategy1 implements Strategy {
    public function algorithm() {
        //...
    }
}

class Strategy2 implements Strategy {
    public function algorithm() {
        //...
    }
}
