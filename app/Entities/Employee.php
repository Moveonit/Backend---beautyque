<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * @property integer  id
 * @property string   name
 * @property integer  spas_id
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Employee extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'spas_id'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->morphMany('User', 'userable');
    }

    /**
     * Get the spa associated at the employee.
     */
    public function spa()
    {
        return $this->hasOne('Spa');
    }
}
