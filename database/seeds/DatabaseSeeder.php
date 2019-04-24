<?php

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
        $this->call(BarangaySeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(ClusterSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(mLGUSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
