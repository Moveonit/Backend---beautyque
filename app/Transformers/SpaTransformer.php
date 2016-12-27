<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Spa;
use League\Fractal;

class SpaTransformer extends Fractal\TransformerAbstract
{
    public function transform(Spa $spa)
    {
        return [
            'id'        => (integer) $spa->id,
            'name'      => (string) $spa->name,
            'email'     => (string) $spa->email,
            'links'     => [
                [
                    'rel'   => 'self',
                    'user'  => '/users/'.$spa->id,
                ]
            ],
        ];
    }
}