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
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();

        $this->call(LaratrustSeeder::class);
        $this->call(AccountsTableSeeder::class);
        $this->call(BreedsTableSeeder::class);

        $path = 'app/database/seeds/zip_code.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Zip Code table seeded!');
    }
}
