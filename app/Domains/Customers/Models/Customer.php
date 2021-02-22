<?php

namespace Domains\Customers\Models;

use Domains\Customers\Factories\CustomerFactory;
use Illuminate\Support\Pluralizer;
use Parents\Models\Model;

final class Customer extends Model
{
    public $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'city',
        'username',
        'gender',
        'phone'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return CustomerFactory
     */
    protected static function newFactory(): CustomerFactory
    {
        $reflect = new \ReflectionClass(new static());
        $resourceKey = Pluralizer::plural($reflect->getShortName());
        $namespace = '\Domains\\' . $resourceKey . '\Factories\\' . $reflect->getShortName() . 'Factory';
        return call_user_func(array($namespace, 'new'));
    }
}
