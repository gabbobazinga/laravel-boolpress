<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // for ($i=0; $i < 10; $i++) { 
        //     DB::table('tags')->insert([
        //         'tag' => $faker->word(),
        //     ]);
        // }

        for ($i=0; $i < 10; $i++) { 
            $newTag = new Tag;
            $newTag->tag = $faker->unique()->word();
            $newTag->save();
        }
    }
}
