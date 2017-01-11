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
            'id'                    => (integer) $user->id,
            'email'                 => (string) $user->email,
            'type'                  => (string) $user->userable_type,
            $user->userable_type    => $user->userable,
        ];
    }

    /**
     * Include Guest
     *
     * @return League\Fractal\ItemResource

    public function includeUserable(User $user)
    {
        $author = $user->userable();

        return $this->item($author, new AuthorTransformer);
    }*/
}