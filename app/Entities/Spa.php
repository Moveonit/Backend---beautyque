<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Spa
 * @property integer  id
 * @property string   company_name
 * @property string   vat_number
 * @property string   fiscal_code
 * @property string   address
 * @property string   city
 * @property string   telephone
 * @property string   zip_code
 * @property string   fax
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Spa extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['company_name', 'vat_number', 'fiscal_code', 'address', 'city', 'telephone', 'zip_code','fax'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->morphMany('User', 'userable');
    }
    /**
     * Get the employee of the spa.
     */
    public function employee()
    {
        return $this->belongsTo('Employee');
    }
}
