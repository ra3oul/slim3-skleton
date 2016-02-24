<?php

/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 3:15 PM
 */
namespace Tourism\database\migrations;

use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateFooTable
 * @package Tourism\database\migrations
 */
class CreateFooTable extends Migration
{


    /**
     *
     */
    public function up()
    {

        $this->schema->create('foo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     *
     */
    public function down()
    {
        $this->schema->drop('foo');
    }

}