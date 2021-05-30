<?php

namespace App\Container;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;

class Container
{
    protected array $instances = [];

    /**
     * Register class, interface
     *
     * @param $abstract
     * @param $concrete
     */
    public function bind($abstract, $concrete = NULL)
    {
        if (is_null($concrete)) {
            $concrete = $abstract;
        }
        $this->instances[$abstract] = $concrete;
    }

    /**
     * Get instance form Container
     *
     * @param $abstract
     * @param array $parameters
     * @return mixed|object
     * @throws ReflectionException
     */
    public function make($abstract, array $parameters = [])
    {
        if (!isset($this->instances[$abstract])) {
            $this->bind($abstract);
        }

        return $this->resolve($this->instances[$abstract], $parameters);
    }

    /**
     * Use Reflection and recursive inspect class and class dependency
     *
     * @param $concrete
     * @param $parameters
     * @return mixed|object
     * @throws ReflectionException
     * @throws Exception
     */
    protected function resolve($concrete, $parameters)
    {
        if ($concrete instanceof Closure) {
            return $concrete($this, $parameters);
        }

        $reflector = new ReflectionClass($concrete);

        if (!$reflector->isInstantiable()) {
            throw new Exception("Class $concrete is not instantiable");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return $reflector->newInstance();
		}

        $parameters = $constructor->getParameters();
        $dependencies = $this->resolveDependencies($parameters);

        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * Use Reflection and recursive inspect class and get class dependency
     * @param $parameters
     * @return array
     * @throws Exception
     */
    protected function resolveDependencies($parameters): array
    {
        $dependencies = [];
 
        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if (is_null($dependency)) {
                if ($parameter->isDefaultValueAvailable()) {
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    throw new Exception("Can not resolve dependency $parameter->name");
                }
            } else {
                $dependencies[] = $this->make($dependency->name);
            }
        }

        return $dependencies;
    }
}
