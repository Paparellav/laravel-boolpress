<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'antipasto',
            'primo piatto',
            'secondo piatto',
            'verdura',
            'contorno',
            'dessert'
        ];

        foreach ($categories as $item) {
            $new_category = new Category();
            $new_category->name = $item;
            $new_category->slug = Str::slug($new_category->name, '-');
            $new_category->save();
        }
    }
}
