<?php

namespace Acme\Repos;

use App\Article;

class PostsRepo implements PostsRepoInterface
{
    public function getPaginated(array $params)
    {
        if ($params['sortBy'] || $params['order']) {
            return Article::orderBy($params['sortBy'], $params['order'])->paginate(10);
        }
        return Article::paginate(10);
    }
}
