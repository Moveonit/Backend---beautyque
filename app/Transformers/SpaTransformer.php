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
            'id'                => (integer) $spa->id,
            'company_name'      => (string) $spa->company_name,
            'vat_number'        => (string) $spa->vat_number,
            'fiscal_code'       => (string) $spa->fiscal_code,
            'address'           => (string) $spa->address,
            'city'              => (string) $spa->city,
            'telephone'         => (string) $spa->telephone,
            'zip_code'          => (string) $spa->zip_code,
            'fax'               => (string) $spa->fax,
            'latitude'          => (float)  $spa->latitude,
            'longitude'         => (float)  $spa->longitude,
            //'employees'         => $spa->employee(),
            /*'links'     => [
                [
                    'rel'   => 'self',
                    'user'  => '/spas/'.$spa->id,
                ]
            ],*/
        ];
    }
}