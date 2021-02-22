<?php

namespace Parents\Transformers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use League\Fractal\TransformerAbstract as FractalTransformer;

/**
 * Class Transformer.
 */
abstract class Transformer extends FractalTransformer
{

    /**
     * @return  mixed
     */
    public function user(): User
    {
        return Auth::user();
    }


}
