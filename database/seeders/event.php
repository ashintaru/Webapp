<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class event extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->insert([
            'eventPlace' => Str::random(10),
            'eventTitle' => Str::random(10),
            'eventDate' => Carbon::today(),
            'eventType' => 1
        ]);
    }
}
