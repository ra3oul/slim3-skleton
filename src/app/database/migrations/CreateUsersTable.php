<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 2/27/16
 * Time: 2:24 PM
 */
namespace Tourism\database\migrations;

use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateUsersTable
 * @package Tourism\database\migrations
 */
class CreateUsersTable extends Migration
{

    public function up()
    {

        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('userName');
            $table->string('email');
            $table->string('mobile');

            $table->timestamps();


            $table->primary('id');
            $table->index('email');
            $table->index('mobile');


        });
    }


    public function down()
    {
        $this->schema->drop('users');
    }

}