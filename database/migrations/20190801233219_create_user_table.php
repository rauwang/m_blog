<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateUserTable extends Migrator
{
    public function up()
    {
        $table = $this->table('user');
        if (false == $table->exists()) {
            $table
//                ->setId('id')
                ->addColumn('username', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('password', 'string', ['limit' => 32, 'null' => false])
                ->addTimestamps() // 创建&更新时间。类型：TIMESTAMP
                ->addSoftDelete() // 删除时间。类型：TIMESTAMP
                ->setEngine('InnoDB')
                ->addIndex(['username'], ['unique' => true]) // 唯一索引
                ->save();
        }
    }

    public function down()
    {
        $table = $this->table('user');
        if ($table->exists()) $table->drop();
    }
}
