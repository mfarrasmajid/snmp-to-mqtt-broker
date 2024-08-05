<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try{
            $user = DB::table('users')->insert([
                                        'username' => 'admin',
                                        'name' => 'Admin',
                                        'password' => Hash::make('snmp2mqtt#admin'),
                                        'is_admin' => 1,
                                        'status_active' => 1
            ]);
            if ($user){
                $log = DB::table('log')->insert([
                    'username' => 'SEEDER',
                    'activity' => 'Successfully created admin login',
                    'status' => 'SUCCESS',
                ]);
            }
        } catch(\Exception $e){
            $log = DB::table('log')->insert([
                'username' => 'SEEDER',
                'activity' => $e->getMessage(),
                'status' => 'ERROR',
            ]);
        }
        
    }
}
