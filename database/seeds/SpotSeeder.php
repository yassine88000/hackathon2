<?php


use Illuminate\Database\Seeder;
use App\Spot;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spots = [
            [
                'name'     => 'Quai Alpha',
                'slug'    => 'quai-alpha'
            ],
            [
                'name'     => 'Pôle E-tourisme',
                'slug'    => 'pole-tourisme'

            ],
            [
                'name'     => 'Pôle Image',
                'slug'    => 'pole-image'

            ]
        ];

        foreach ($spots as $spot) {
            Spot::create($spot);
        }
    }
}
