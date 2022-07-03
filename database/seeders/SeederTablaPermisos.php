<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos= [
        'Navegar categorías',
        'Ver detalle de categoría',
        'Edición de categorías',
        'Creación de categorías',
        'Eliminar categorías',

        'Navegar por clientes',
        'Ver detalle de cliente',
        'Edición de clientes',
        'Creación de clientes',
        'Eliminar clientes',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
