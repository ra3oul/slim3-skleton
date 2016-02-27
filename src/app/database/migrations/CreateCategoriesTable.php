<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 2/27/16
 * Time: 2:18 PM
 */
namespace Tourism\database\migrations;

use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCategoriesTable
 * @package Tourism\database\migrations
 */
class CreateCategoriesTable extends Migration
{

    public function up()
    {

        $this->schema->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->timestamps();

            $table->primary('id');
            $table->index('slug');

        });
    }


    public function down()
    {
        $this->schema->drop('categories');
    }

}
