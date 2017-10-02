<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trains';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function available_quests()
    {
    	$quests = $this->hasMany('App\TrainQuest');
        $quests->getQuery()->where('used', 0);
        return $quests;
    }
}
