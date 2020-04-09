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
        'AppAoT\\Generated\\Factory\\Easy\\Admin\\Dashboard\\Handler\\IndexHandlerFactory' => 'Factory/Easy/Admin/Dashboard/Handler/IndexHandlerFactory.php',
        'AppAoT\\Generated\\Factory\\Easy\\Admin\\Dashboard\\ConfigProviderFactory' => 'Factory/Easy/Admin/Dashboard/ConfigProviderFactory.php',
        'AppAoT\\Generated\\Factory\\Easy\\Admin\\Dashboard\\Responder\\IndexResponderFactory' => 'Factory/Easy/Admin/Dashboard/Responder/IndexResponderFactory.php',
        'AppAoT\\Generated\\Factory\\Easy\\Admin\\Admin\\ConfigProviderFactory' => 'Factory/Easy/Admin/Admin/ConfigProviderFactory.php',
        'AppAoT\\Generated\\Factory\\Easy\\Admin\\Admin\\TemplateRenderer\\AdminTemplateRendererInterfaceFactory' => 'Factory/Easy/Admin/Admin/TemplateRenderer/AdminTemplateRendererInterfaceFactory.php',
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
