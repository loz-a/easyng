<?php

/**
 * Generated autoloader for Laminas\Di
 */

namespace AppAoT\Generated;

use function spl_autoload_register;
use function spl_autoload_unregister;

class Autoloader
{
    private $registered = false;
    private $classmap = [
        'AppAoT\\Generated\\Factory\\App\\Handler\\PingHandlerFactory' => 'Factory/App/Handler/PingHandlerFactory.php',
        'AppAoT\\Generated\\Factory\\App\\Handler\\HomePageHandlerFactory' => 'Factory/App/Handler/HomePageHandlerFactory.php',
        'AppAoT\\Generated\\Factory\\App\\ConfigProviderFactory' => 'Factory/App/ConfigProviderFactory.php',
        'AppAoT\\Generated\\GeneratedInjector' => 'GeneratedInjector.php',
    ];

    public function register() : void
    {
        if (! $this->registered) {
            spl_autoload_register($this);
            $this->registered = true;
        }
    }

    public function unregister() : void
    {
        if ($this->registered) {
            spl_autoload_unregister($this);
            $this->registered = false;
        }
    }

    public function load(string $class) : void
    {
        if (isset($this->classmap[$class])) {
            include __DIR__ . '/' . $this->classmap[$class];
        }
    }

    public function __invoke(string $class) : void
    {
        $this->load($class);
    }
}
