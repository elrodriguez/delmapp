<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Passport\ClientRepository;

class ClientRepositorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new ClientRepository();

        // $client->createPasswordGrantClient(null, 'Default password grant client', 'http://elmer.delmapp.test');
        $client->createPersonalAccessClient(null, 'Default personal access client', 'http://elmer.delmapp.test');
    }
}
