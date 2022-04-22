<?php

namespace Database\Seeders;

use App\Http\Controllers\Todo;
use App\Models\Todo as ModelsTodo;
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
        \App\Models\Todo::factory(50)->create();
        // \App\Models\User::factory()->count(10)->create();
        // $this -> call([
        //     ModelsTodo::class
        // ]);
    }
}
