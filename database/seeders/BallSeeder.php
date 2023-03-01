<?php

namespace Database\Seeders;

use App\Models\Ball;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $balls = New Ball();
        $balls->name = 'pink';
        $balls->save();

        $balls1 = New Ball();
        $balls->name = 'red';
        $balls->save();

        $balls = New Ball();
        $balls->name = 'blue';
        $balls->save();

        $balls = New Ball();
        $balls->name = 'orange';
        $balls->save();

        $balls = New Ball();
        $balls->name = 'green';
        $balls->save();
    }
}
