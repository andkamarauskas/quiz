<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public function quests()
    {
        return $this->hasMany('App\Quest');
    }
}
