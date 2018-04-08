<?php

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        $this->call('CountryTableSeeder');

        // If this is a development environment: Create sample records
        if (App::environment('local')) {
            $this->call('DayTableSeeder');
            $this->call('EventTableSeeder');
            $this->call('LinkTableSeeder');
            $this->call('OrganizerTableSeeder');
            $this->call('PresenterSessionTableSeeder');
            $this->call('PresenterTableSeeder');
            $this->call('PresenterTagTableSeeder');
            $this->call('RoomTableSeeder');
            $this->call('SeriesTableSeeder');
            $this->call('SessionTableSeeder');
            $this->call('SessionTagTableSeeder');
            $this->call('TagTableSeeder');
            $this->call('VenueTableSeeder');
        }

        Model::reguard();
    }
}
