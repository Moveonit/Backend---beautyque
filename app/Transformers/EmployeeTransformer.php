<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Employee;
use League\Fractal;

class EmployeeTransformer extends Fractal\TransformerAbstract
{
    public function transform(Employee $employee)
    {
        return [
            'id'        => (integer) $employee->id,
            'name'      => (string) $employee->name,
            'email'     => (string) $employee->email,
            'links'     => [
                [
                    'rel'   => 'self',
                    'user'  => '/users/'.$employee->id,
                ]
            ],
        ];
    }
}