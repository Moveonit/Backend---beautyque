<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Employee
 * @property integer  id
 * @property string   name
 * @property string  spa_id
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Employee extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'spa_id'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->morphMany('User', 'userable');
    }

    /**
     * Get the spa associated at the employee.
     * @return \App\Entities\Spa
     */
    public function spa()
    {
        return Spa::find($this->spa_id);
        //return $this->belongsTo('App\Entities\Spa');
    }
}
