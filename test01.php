<?php

namespace MyApp {
    class Consumer {
        public $dependency;
        public function __construct(Dependency $dependency)
        {
            $this->dependency = $dependency;
        }
    }

    class Dependency {
    }
}

namespace {
    include 'bootstrap.php';
    $di = new \Zend\Di\Di;
    $consumer = $di->get('MyApp\Consumer');

    $works = ($consumer->dependency instanceof MyApp\Dependency);

    echo ($works ? 'It works' : 'It does not works') . PHP_EOL;
}
