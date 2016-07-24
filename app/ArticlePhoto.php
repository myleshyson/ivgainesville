<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ArticlePhoto extends Model
{	
	/**
	 * Mass Assignable Fields
	 * @var array
	 */
    protected $fillable = [
    	'path'
    ];

    /**
     * Use article_photos Table
     * @var string
     */
    protected $table = 'article_photos';

    /**
     * Belongs to One Article
     * @return  Article
     */
    public function article()
    {
    	return $this->belongsTo(Article::class);
    }

    public function delete()
    {
        File::delete([
            $this->path
        ]);

        parent::delete();
    }
}
