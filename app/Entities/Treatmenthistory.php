<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Treatmenthistory
 * @property integer  id
 * @property string   description
 * @property integer  treatment_id
 * @property integer  user_id
 * @property integer  spa_id
 * @property integer  employee_id
 * @property Carbon   date
 * @property Carbon   created_at
 * @property Carbon   updated_at
 */
class Treatmenthistory extends Model
{
    //
    protected $fillable = ['description','treatment_id','user_id','spa_id','employee_id','date'];

    protected $guarded = ['id'];

    /**
     * Get the treatment record.
     */
    public function treatment()
    {
        return $this->belongsTo('Treatment');
    }

    /**
     * Get the user record.
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Get the spa record.
     */
    public function spa()
    {
        return $this->belongsTo('Spa');
    }

    /**
     * Get the employee record.
     */
    public function employee()
    {
        return $this->belongsTo('Employee');
    }
}
