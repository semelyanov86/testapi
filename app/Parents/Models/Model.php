<?php

namespace Parents\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as LaravelModel;
use Illuminate\Support\Pluralizer;
use Parents\Factories\Factory;

abstract class Model extends LaravelModel
{
    use HasFactory;

}
