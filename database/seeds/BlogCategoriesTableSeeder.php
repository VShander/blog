<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $cName = 'Без категории';

        $categories[] = [
            'title' => $cName,
            'alias' => Str::slug($cName),
            'parent_id' => 0,
        ];

        for ($i = 2; $i <= 11; $i++) {
            $cName = 'Категория #' . $i;
            $parendId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title' => $cName,
                'alias' => Str::slug($cName),
                'parent_id' => $parendId,
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
