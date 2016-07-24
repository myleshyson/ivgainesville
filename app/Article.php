<?php

namespace App;

use App\ArticlePhoto;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * Make published_at colmun a Carbon\Carbon instance
     */
    protected $dates = ['published_at', 'updated_at', 'created_at'];

    /**
     * Checks if the published at is less than now.
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopePublished($query)
    {
        $query->where([

            ['published_at', '<=', Carbon::now()],

            ['is_published', true],
        ]);
    }

    public function setPublishedAtAttribute($date)
    {

        $this->attributes['published_at'] = Carbon::parse($date);
    }


    /**
     * Has many Photo
     * @return  Photo
     */

    public function photos()
    {
        return $this->hasMany(ArticlePhoto::class, 'article_id');
    }

    /**
     * Belongs To User
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delete()
    {
        foreach ($this->photos as $photo) {
            File::delete($photo->path);
        }

        parent::delete();
    }

}
