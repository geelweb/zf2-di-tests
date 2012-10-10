#ZF2 DI tests

Some test to understant the ZendFramework approch of dependency injection.

to run the test simply execute them like that

    env ZF2_PATH=/path/to/zf2/library php test03.php

##test01.php

A basic test with a dependency in the constructor method and without any configuration.

##test02.php

A more complex test, still with depdendency in constructor but this time Zend\Di\Di is configured to inject options to the dependency

##test03.php

An other basic test, using setter instead of constructor
