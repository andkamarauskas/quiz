<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quest_id', 'answer'];

    public function quest()
    {
    	return $this->belongsTo('App\Quest');
    }
}
