<?php

use think\migration\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        if ($this->hasTable('user')) {
            $user = new \app\admin\model\User();
            $this->insert('user', [
                ['username' => 'admin', 'password' => $user->formatPassword('admin')],
            ]);
        }
    }
}