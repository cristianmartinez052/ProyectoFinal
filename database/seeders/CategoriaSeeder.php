<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Componentes, perifericos, telefonia, consolas y videojuegos, gaming, audio,video y foto, televisores
         $categorias=['Componentes','Periféricos','Telefonía','Consolas y videojuegos','Gaming','Audio, foto y video'];
         foreach($categorias as $c){
             Categoria::create([
                 'nombre'=>$c,
                 'descripcion'=>'Descripcion de '.$c
             ]);
         }
    }
}
