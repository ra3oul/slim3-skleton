<?php
/**
 * Created by PhpStorm.
 * User: ra3oul
 * Date: 2/24/16
 * Time: 3:51 PM
 */

namespace Tourism\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Interop\Container\ContainerInterface;

class Migration
{
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;
    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function __construct(ContainerInterface $app)
    {
        $this->capsule = new Capsule();
        $databaseConfig = $app->get('config')->get('database');
        $this->capsule->addConnection($databaseConfig);
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }

}
