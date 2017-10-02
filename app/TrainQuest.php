<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainQuest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'train_quests';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['train_id','quest_id','used'];

    public function train()
    {
        return $this->belongsTo('App\Train');
    }
    public function quest()
    {
    	return $this->belongsTo('App\Quest');
    }
    public function user_answers()
    {
        return $this->hasMany('App\UserAnswer','train_quest_id');
    }
}
