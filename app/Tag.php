<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Mass assignamble fields
     * 
     * @var
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Article tag relationship. collection of articles for Tag.
     * @return [type] [description]
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    
    public static function filterTags($postedTags)
    {
        $Tags = [];

        $DBTags = self::lists('name', 'id')->toArray();

        if(!empty($postedTags) && is_array($postedTags))

        {

            foreach($postedTags as $postedTag)

            {

                if(is_numeric($postedTag))

                {

                    $Tags[] = intval($postedTag);

                }

                elseif(in_array($postedTag, $DBTags))

                {

                    $Tags[] = array_search($postedTag, $DBTags);

                }

                else

                {

                    $Tags[] = self::create(['name' => $postedTag])->id;

                }

            }

        }

        return $Tags;

    }
}
