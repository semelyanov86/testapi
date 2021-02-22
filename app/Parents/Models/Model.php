<?php

namespace Parents\Models;

use Illuminate\Database\Eloquent\Model as LaravelModel;
use Illuminate\Support\Pluralizer;

abstract class Model extends LaravelModel
{

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): \Parents\Factories\Factory
    {
        $reflect = new \ReflectionClass(new static());
        $resourceKey = Pluralizer::plural($reflect->getShortName());
        $namespace = '\Domains\\' . $resourceKey . '\Factories\\' . $reflect->getShortName() . 'Factory';
        return call_user_func(array($namespace, 'new'));
    }
}
