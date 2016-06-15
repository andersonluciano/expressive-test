<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 6/15/16
 * Time: 4:35 PM
 */

namespace App\Action;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;
use ReflectionClass;

/**
 * Class AbstractActionFactory
 *
 * @package App\Action
 *
 * Example extracted from https://github.com/xtreamwayz/xtreamwayz.com/blob/master/src/Frontend/Action/AbstractActionFactory.php
 */
class AbstractActionFactory implements AbstractFactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     *
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Construct a new ReflectionClass object for the requested action
        $reflection = new ReflectionClass($requestedName);
        // Get the constructor
        $constructor = $reflection->getConstructor();
        if (null === $constructor) {
            // There is no constructor, just return a new class
            return new $requestedName;
        }
        // Get the parameters
        $parameters = $constructor->getParameters();
        $dependencies = [];
        foreach ($parameters as $parameter) {
            // Get the parameter class
            $class = $parameter->getClass();
            // Get the class from the container
            $dependencies[] = $container->get($class->getName());
        }

        // Return the requested class and inject its dependencies
        return $reflection->newInstanceArgs($dependencies);
    }

    /**
     * Can the factory create an instance for the service?
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     *
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        // Only accept Action classes
        if (substr($requestedName, -6) === 'Action') {
            return true;
        }

        return false;
    }

}