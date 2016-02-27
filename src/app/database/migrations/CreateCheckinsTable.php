<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 2/24/16
 * Time: 8:49 PM
 */
namespace Tourism\database\migrations;

use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCheckinsTable
 * @package Tourism\database\migrations
 */
class CreateCheckinsTable extends Migration
{

    public function up()
    {

        $this->schema->create('checkins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->text('description');
            $table->timestamps();

            $table->primary('id');
            $table->index('user_id');
            $table->index('place_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');


            $table->foreign('place_id')
                ->references('id')->on('places')
                ->onDelete('cascade');

        });
    }


    public function down()
    {
        $this->schema->drop('checkins');
    }

}
