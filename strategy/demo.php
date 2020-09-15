<?php

interface KickBehavior {
    public function kick();
}
class TornadoKick implements KickBehavior {
    public function kick() {
        echo "tornado kick\r\n";
    }
}
class LightningKick implements KickBehavior {
    public function kick() {
        echo "lightning kick\r\n";
    }
}
interface JumpBehavior {
    public function jump();
}
class LongJump implements JumpBehavior {
    public function jump() {
        echo "long jump\r\n";
    }
}
class ShortJump implements JumpBehavior {
    public function jump() {
        echo "short jump\r\n";
    }
}

abstract class Fighter {
    protected $kickbehavior;
    protected $jumpBehavior;

    public function setKickBehavior($kickbehavior) {
        $this->kickbehavior = $kickbehavior;
    }
    public function setJumpBehavior($jumpBehavior) {
        $this->jumpBehavior = $jumpBehavior;
    }
    public function kick() {
        if ($this->kickbehavior) {
            $this->kickbehavior->kick();
        }
    }
    public function jump() {
        if ($this->jumpBehavior) {
            $this->jumpBehavior->jump();
        }
    }
    public function punch() {
        echo "default punch\r\n";
    }
    public function roll() {
        echo "default roll\r\n";
    }
    abstract public function display();
}

class Ryu extends Fighter {
    public function __construct($kickbehavior) {
        $this->setKickBehavior($kickbehavior);
    }
    public function display() {
        echo "Ryu\r\n";
    }
}
class Ken extends Fighter {
    public function display() {
        echo "Ken\r\n";
    }
}
class ChunLi extends Fighter {
    public function __construct($kickbehavior, $jumpBehavior) {
        $this->setKickBehavior($kickbehavior);
        $this->setJumpBehavior($jumpBehavior);
    }
    public function display() {
        echo "Ken\r\n";
    }
}

$lightningKick = new LightningKick();
$tornadoKick = new TornadoKick();
$longJump = new LongJump();
$shortJump = new ShortJump();

$fighter1 = new Ken();
$fighter1->display();
$fighter1->roll();
$fighter1->kick();


$fighter2 = new Ryu($lightningKick);
$fighter2->display();
$fighter2->roll();
$fighter2->kick();

$fighter3 = new ChunLi($tornadoKick, $shortJump);
$fighter3->display();
$fighter3->roll();
$fighter3->jump();
$fighter3->kick();
$fighter3->setJumpBehavior($longJump);
$fighter3->jump();
