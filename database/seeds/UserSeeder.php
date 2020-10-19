<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'     => 'Gerome',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
                'is_admin' => 1,
                'is_judge' => 0,
                'spot_id' => 1
            ],
            [
                'name'     => 'Gerome le Juge',
                'email'    => 'juge@juge.com',
                'password' => bcrypt('password'),
                'is_admin' => 0,
                'is_judge' => 1,
                'spot_id' => 2
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
