<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   public function test_list_page_shows_all_assignments()
{
$assignment = Article::create([
'title' => 'My great assignment'
]);
$this->visit('assignments')
->andSee(['My great assignment']);
}
}
