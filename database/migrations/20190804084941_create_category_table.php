<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateCategoryTable extends Migrator
{
    public function up()
    {
        $table = $this->table('category');
        if (false == $table->exists())
        {
            $table
                ->addColumn('fid', 'integer', ['default' => 0, 'null' => false])
                ->addColumn('name', 'string', ['limit' => 300, 'null' => false])
                ->addTimestamps()
                ->addSoftDelete()
                ->setEngine('InnoDB')
                ->addIndex(['fid'])
                ->save();
        }
    }

    public function down()
    {
        $table = $this->table('category');
        if ($table->exists()) $table->drop();
    }
}
