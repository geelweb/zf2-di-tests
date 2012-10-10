<?php

namespace MyApp {
    class Consumer {
        public $dependency;
        public function __construct(Dependendy $dependency) {
            $this->dependency = $dependency;
        }
    }

    class Dependendy {
        public $options;
        public function __construct($options)
        {
            $this->options = $options;
        }
    }
}

namespace {
    $dependency_options = array(
        'a_key' => 42,
        'another_key' => 'foo',
    );
    include 'bootstrap.php';
    $di = new \Zend\Di\Di;

    $di->configure(new \Zend\Di\Config(array(
        'instance' => array(
            'MyApp\Dependendy' => array(
                'parameters' => array(
                    'options' => $dependency_options
                ),
            ),
        ),
    )));

    $consumer = $di->get('MyApp\Consumer');

    $works = ($consumer->dependency instanceof MyApp\Dependendy) && ($consumer->dependency->options === $dependency_options);

    echo ($works ? 'It works' : 'It does not works') . PHP_EOL;
}
