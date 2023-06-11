<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas=['Apple','Nvidia','AMD','Intel','LG','Samsung','MSI','Logitech','Razer','Xiaomi','Nintendo','Sony','Microsoft'];
         foreach($marcas as $c){
             Marca::create([
                 'nombre'=>$c,
             ]);
         }
    }
}
