<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 2/24/16
 * Time: 8:37 PM
 */
namespace Tourism\database\migrations;

use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateFooTable
 * @package Tourism\database\migrations
 */
class CreatePlacesTable extends Migration
{

    public function up()
    {

        $this->schema->create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->float('lat');
            $table->float('lon');
            $table->text('address');
            $table->integer('checkins_count');
            $table->timestamps();


            $table->primary('id');
            $table->index('name');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        $this->schema->drop('places');
    }

}