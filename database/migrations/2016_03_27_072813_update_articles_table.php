<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = DB::getQueryGrammar()->wrapTable('articles');
        
        DB::statement('ALTER TABLE '.$tableName.' MODIFY `published_at` TIMESTAMP NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableName = DB::getQueryGrammar()->wrapTable('articles');
        
        DB::statement('ALTER TABLE '.$tableName.' MODIFY `published_at` TIMESTAMP NULL;');
    }
}
