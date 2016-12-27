<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\User::class, 50)->create();
        factory(\App\Entities\Guest::class, 50)->create();
        factory(\App\Entities\Spa::class, 50)->create()->each(function ($u) {
            $u->employee()->save(factory(\App\Entities\Employee::class)->make());
        });
    }
}
