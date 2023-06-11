<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Marca;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));
        return [
            //
            'nombre'=>ucfirst($this->faker->unique()->words(random_int(1,5),true)),
            'descripcion'=>$this->faker->text(),
            'caracteristicas'=>$this->faker->words(random_int(1,20),true),
            'tipo'=>$this->faker->words(random_int(1,4),true),
            'precio'=>random_int(1,2000),
            'stock'=>random_int(0,100),
            'imagen'=>'productos/'.$this->faker->picsum(dir:"public/storage/productos", height:480,width:640, fullPath:false),
            'categoria_id'=>Categoria::all()->random()->id,
            'marca_id'=>Marca::all()->random()->id,

        ];
    }
}
