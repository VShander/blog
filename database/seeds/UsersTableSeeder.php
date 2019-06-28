<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $data = [
        [
            'name' => 'Автор не известен',
            'email' => 'author_unknown@g.g',
            'password' => bcrypt(Str::random(16)),
        ],
        [
            'name' => 'Автор',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('123456789')
        ]
        ];

        DB::table('users')->insert($data);

    }
}
