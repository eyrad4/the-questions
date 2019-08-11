<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\TSlug;

class Question extends Model
{
    use TSlug;

    protected $appends = [
        'created_date'
    ];

    /**
     * Boot method. Observer for model on created method.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($question) {
            $question->slug = $question->seoSlug(class_basename($question), $question->id, $question->created_at);
            $question->save();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
