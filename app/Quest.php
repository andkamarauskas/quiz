<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quest extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quests';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','status', 'title', 'question'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    public function quizzes()
    {
        return $this->belongsToMany('App\Quiz');
    }
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
