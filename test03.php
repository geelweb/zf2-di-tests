<?php

namespace MyApp {
    class Consumer {
        private $_dependency;
        public function setDependency(Dependency $dependency) {
            $this->_dependency = $dependency;
        }
        public function getDependency() {
            return $this->_dependency;
        }
    }

    class Dependency {
    }
}

namespace {
    include 'bootstrap.php';
    $di = new \Zend\Di\Di;

    $di->configure(new \Zend\Di\Config(array(
        'instance' => array(
            'MyApp\Consumer' => array(
                'parameters' => array(
                    'dependency' => 'MyApp\Dependency'
                ),
            ),
        ),
    )));

    $consumer = $di->get('MyApp\Consumer');

    $works = ($consumer->getDependency() instanceof MyApp\Dependency);

    echo ($works ? 'It works' : 'It does not works') . PHP_EOL;
}

