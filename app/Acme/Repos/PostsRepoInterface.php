<?php

namespace Acme\Repos;

interface PostsRepoInterface 
{

	public function getPaginated(array $params);
}