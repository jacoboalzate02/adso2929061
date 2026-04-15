<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Adoption;
use App\Models\Pet;

class AdoptionSeeder extends Seeder
{
    public function run(): void
    {
        $adopt = new Adoption;
        $adopt->user_id = 2;
        $adopt->pet_id = 2;

        if ($adopt->save()) {
            $pet = Pet::find($adopt->pet_id);
            $pet->adopted = 1;   // ← ESTO estaba como $pet->status = 1
            $pet->save();
        }

        $adopt = new Adoption;
        $adopt->user_id = 2;
        $adopt->pet_id = 3;

        if ($adopt->save()) {
            $pet = Pet::find($adopt->pet_id);
            $pet->adopted = 1;
            $pet->save();
        }
    }
}