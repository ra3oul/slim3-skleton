<?php
/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 3:51 PM
 */

namespace Tourism\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Migration
{
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;
    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function __construct()
    {
        $this->capsule = new Capsule();
        //todo should be in config hal nadaram felan configo shanbe mizanam !

        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'port'      => '',
            'database'  => 'tourism',
            'username'  => 'root',
            'password'  => '1234',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }

}