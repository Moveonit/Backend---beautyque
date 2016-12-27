<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Guest;
use League\Fractal;

class GuestTransformer extends Fractal\TransformerAbstract
{
    public function transform(Guest $guest)
    {
        return [
            'id'        => (integer) $guest->id,
            'name'      => (string) $guest->name,
            'email'     => (string) $guest->email,
            'links'     => [
                [
                    'rel'   => 'self',
                    'user'  => '/users/'.$guest->id,
                ]
            ],
        ];
    }
}