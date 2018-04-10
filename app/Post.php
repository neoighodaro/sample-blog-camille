<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // Fillable columns
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'excerpt',
        'type_id',
        'genre_id',
        'image',
    ];

    /**
     * Relationship with post_types
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo(PostType::class);
    }

    /**
     * Relationship with genre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genre()
    {
        return $this->belongsTo(PostGenre::class);
    }
}
