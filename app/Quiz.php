<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quizzes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'about', 'persons_num', 'quests_num', 'date', 'time'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function quests()
    {
        return $this->belongsToMany('App\Quest');
    }
}
