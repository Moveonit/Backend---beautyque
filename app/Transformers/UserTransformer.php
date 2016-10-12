<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\User;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'        => (integer) $user->id,
            'name'      => (string) $user->name,
            'email'     => (string) $user->email,
            'links'     => [
                [
                    'rel'   => 'self',
                    'user'  => '/users/'.$user->id,
                ]
            ],
        ];
    }
}