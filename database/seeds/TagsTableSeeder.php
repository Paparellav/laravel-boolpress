<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'vagetariano',
            'carne',
            'piatto veloce',
            'pesce',
            'senza glutine',
            'fit',
            'slow food',
            'italiano'
        ];

        foreach($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($new_tag->name, '-');
            $new_tag->save();
        }
    }
}
