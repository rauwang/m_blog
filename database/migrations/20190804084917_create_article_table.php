<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateArticleTable extends Migrator
{
    public function up()
    {
        $table = $this->table('article');
        if (false == $table->exists())
        {
            $table
                ->addColumn('u_id', 'integer', ['null' => false])
                ->addColumn('c_id', 'integer', ['null' => false])
                ->addColumn('title', 'string', ['limit' => 200, 'null' => false])
                ->addTimestamps() // 创建&更新时间。类型：TIMESTAMP
                ->addSoftDelete() // 删除时间。类型：TIMESTAMP
                ->setEngine('InnoDB')
                ->addIndex(['u_id', 'c_id'])
                ->save();
        };
    }

    public function down()
    {
        $table = $this->table('article');
        if ($table->exists())
        {
            $table->drop();
        }
    }
}
