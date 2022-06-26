<?php

namespace Modules\Restaurant\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Restaurant\Entities\RestFloor;
use Modules\Restaurant\Entities\RestTable;
use Modules\Setting\Entities\SetEstablishment;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $establishment = SetEstablishment::first();
        $floor = RestFloor::Create(['establishment_id' => $establishment->id, 'name' => 'piso 1']);

        RestTable::create(
            ['floor_id' => $floor->id, 'name' => 'M1', 'description' => 'Cerca a la entrada']
        );
        RestTable::create(
            ['floor_id' => $floor->id, 'name' => 'M2', 'description' => 'En el centro del salon']
        );
        RestTable::create(
            ['floor_id' => $floor->id, 'name' => 'M3', 'description' => 'En el centro del salon']
        );
        RestTable::create(
            ['floor_id' => $floor->id, 'name' => 'M4', 'description' => 'Cerca a la entrada']
        );
        RestTable::create(
            ['floor_id' => $floor->id, 'name' => 'M5', 'description' => 'Cerca a la baño']
        );
        RestTable::create(
            ['floor_id' => $floor->id, 'name' => 'M6', 'description' => 'Cerca a la escaleras']
        );

        RestFloor::Create(['establishment_id' => $establishment->id, 'name' => 'piso 2']);
    }
}
