<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateCategoryContentTable extends Migrator
{
    public function up()
    {
        $table = $this->table('article_content');
        if (false == $table->exists())
        {
            $table
                ->addColumn('a_id', 'integer', ['null' => false])
                ->addColumn('content', 'text', ['null' => false])
                ->setEngine('InnoDB')
                ->addIndex(['a_id'])
                ->save();
        }
    }

    public function down()
    {
        $tabl = $this->table('article_content');
        if ($tabl->exists())
        {
            $tabl->drop();
        }
    }
}
