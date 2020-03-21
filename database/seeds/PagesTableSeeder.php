<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();

        Page::create([
            'label' => 'support',
            'content' => '',
            'data' => '{}'
        ]);

        Page::create([
            'label' => 'contact',
            'content' => '',
            'data' => '{}'
        ]);
    }
}
