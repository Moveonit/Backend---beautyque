<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Guest
 * @property integer  id
 * @property string   name
 * @property string   surname
 * @property string   city
 * @property string   province
 * @property string   address
 * @property Carbon   birthday
 * @property string   gender
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Guest extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'surname', 'city', 'address', 'birthday','province', 'gender'];

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
