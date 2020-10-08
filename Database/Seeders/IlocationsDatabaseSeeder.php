<?php

namespace Modules\Ilocations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class IlocationsDatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('ilocations__countries')->truncate();
    
    DB::table('ilocations__provinces')->truncate();
    
    DB::table('ilocations__cities')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
    $this->call(CountryTableSeeder::class);
    $this->call(ProvinceTableSeeder::class);
    $this->call(CityTableSeeder::class);
  }
}
