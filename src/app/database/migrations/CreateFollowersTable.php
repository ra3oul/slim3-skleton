<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 2/27/16
 * Time: 2:25 PM
 */
namespace Tourism\database\migrations;

use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePlacesTable
 * @package Tourism\database\migrations
 */
class CreateFollowersTable extends Migration
{

    public function up()
    {

        $this->schema->create('followers', function (Blueprint $table) {
            $table->integer('follower_id')->unsigned();
            $table->integer('followee_id')->unsigned();
            $table->timestamps();


            $table->primary(['follower_id', 'followee_id']);

            $table->foreign('follower_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('followee_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        $this->schema->drop('followers');
    }

}
