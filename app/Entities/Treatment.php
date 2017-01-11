<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Treatment
 * @property integer  id
 * @property string   name
 * @property string   description
 * @property integer  treatment_category_id
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Treatment extends Model
{
    //
    protected $fillable = ['name','description'];

    protected $guarded = ['id'];

    /**
     * Get the phone record associated with the user.
     */
    public function category()
    {
        return TreatmentCategory::find($this->treatment_category_id);
        //return $this->hasOne(TreatmentCategory::class,'id');
    }
}
