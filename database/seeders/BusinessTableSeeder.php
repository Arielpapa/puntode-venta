<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
//

//use App\Business;
use App\Models\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'name'=>'Nombre de la empresa.',
            'description'=>'Descripción corta de la empresa.',
            'logo'=>'logo.png',
            'mail'=>'Ejemplo@gmail.com',
            'address'=>'8888 Cummings Vista Apt. 101, Susanbury, NY 95473',
            'ruc'=>'15247895632',
        ]);
    }
}
