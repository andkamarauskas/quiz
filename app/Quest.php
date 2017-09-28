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
    protected $fillable = ['category_id', 'title', 'question'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
