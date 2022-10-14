<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(5)->create();

       $user = User::factory()->create([
        'name' => 'Lameck Moks',
        'email' => 'lameckmoks@gmail.com'

       ]);

        Listing::factory(6)->create([
            'user_id'  => $user->id
        ]);
    // Listing::create([
    //     'title' => 'Laravel Senior Developer',
    //     'tags' => 'laravel, javascript',
    //     'company' => 'Acme Corp',
    //     'locatipon' => 'Boston, MA',
    //     'email' => 'email1@gmail.com',
    //     'website' => 'https://www.acme.com',
    //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, distinctio tempora debitis, porro possimus doloremque facilis alias neque placeat autem ullam atque aliquid impedit inve.'
        
    // ]);
    // Listing::create([
    //     'title' => 'Full-Stack Engineer',
    //     'tags' => 'laravel, api',
    //     'company' => 'Stark Inderstries',
    //     'locatipon' => 'New York, NY',
    //     'email' => 'email2@gmail.com',
    //     'website' => 'https://www.starkindustries.com',
    //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, distinctio tempora debitis, porro possimus doloremque facilis alias neque placeat autem ullam atque aliquid impedit inve.'
        
    // ]);
     }
}
