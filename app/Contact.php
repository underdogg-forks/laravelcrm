<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at, created_at'];

    protected $guarded = ['_token', 'action'];

    public function activities()
    {
        return $this->morphMany('App\Activity', 'related');
    }

    public function opportunities()
    {
        return $this->hasMany('App\Opportunity');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function adder()
    {
        return $this->belongsTo('App\User');
    }

    public function modifier()
    {
        return $this->belongsTo('App\User');
    }
}
