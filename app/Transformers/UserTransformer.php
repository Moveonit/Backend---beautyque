<?php

use App\Entities\User;
use Carbon\Carbon;
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 11/10/2016
 * Time: 12:09
 */

class UserTransformer extends Themsaid\Transformers\AbstractTransformer
{
    public function transformModel(User $item)
    {
        $output = [
            'id'                => $item->id,
            'name'              => $item->name,
            'email'             => $item->email,
            'timestamp'         => [
                'created_at'        => (string)Carbon::parse($item->created_at)->toIso8601String(),
                'created_at_diff'   => (string)Carbon::parse($item->created_at)->diffForHumans(),
                'updated_at'        => (string)Carbon::parse($item->updated_at)->toIso8601String(),
                'updated_at_diff'   => (string)Carbon::parse($item->updated_at)->diffForHumans(),
            ],
        ];

        return $output;
    }

}