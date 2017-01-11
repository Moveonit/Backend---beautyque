<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Employee;
use App\Entities\TreatmentCategory;
use League\Fractal;

class TreatmentCategoryTransformer extends Fractal\TransformerAbstract
{
    public function transform(TreatmentCategory $treatmentCategory)
    {
        return [
            'id'                => (integer) $treatmentCategory->id,
            'name'              => (string) $treatmentCategory->name,
            'description'       => (string) $treatmentCategory->description
        ];
    }
}