<?php

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

function sortPostsBy($column, $body, $order = 'asc')
{
	return link_to_route('posts', $body, ['sortBy' => $column, 'order' => $order]);
}
