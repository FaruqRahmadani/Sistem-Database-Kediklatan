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
    $this->call(ProvinsisTableSeeder::class);
    $this->call(KotasTableSeeder::class);
    $this->call(KecamatansTableSeeder::class);
    $this->call(KelurahansTableSeeder::class);
    $this->call(UsersTableSeeder::class);
  }
}
