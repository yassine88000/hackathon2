<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name'     => 'pending',
            ],
            [
                'name'     => 'open',
            ],
            [
                'name'     => 'closed',
            ]
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
