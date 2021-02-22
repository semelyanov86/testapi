<?php

namespace Domains\Customers\Models;

use Illuminate\Database\Eloquent\Model;

final class Customer extends Model
{
    public $table = 'users';

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

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
