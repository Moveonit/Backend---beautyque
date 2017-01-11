<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TreatmentCategory
 * @property integer  id
 * @property string   name
 * @property string   description
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class TreatmentCategory extends Model
{

    protected $fillable = ['name','description'];

    protected $guarded = ['id'];

    /**
     * Get treatments of category
     */
    public function treatments()
    {
        return Treatment::where('treatment_category_id',$this->id);
        //return $this->belongsTo(Treatment::class,'id');
    }
}
