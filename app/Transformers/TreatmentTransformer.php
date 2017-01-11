<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Employee;
use App\Entities\Treatment;
use League\Fractal;

class TreatmentTransformer extends Fractal\TransformerAbstract
{
    public function transform(Treatment $treatment)
    {
        $category = $treatment->category();
        return [
            'id'                => (integer) $treatment->id,
            'name'              => (string) $treatment->name,
            'description'       => (string) $treatment->description,
            'category'          => $category
        ];
    }
}