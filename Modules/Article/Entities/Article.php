<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'url',
        'target',
        'slug',
        'details',
        'author',
        'date',
        'view',
        'sort',
        'cover'
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
