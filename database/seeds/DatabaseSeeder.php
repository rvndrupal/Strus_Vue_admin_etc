<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
       // $this->call(CategorySeeder::class);
        //$this->call(TagSeeder::class);
        //$this->call(ProductSeeder::class);
        //$this->call(PaymentMethodSeeder::class);
        //$this->call(CustomerSeeder::class);
        //$this->call(OrderSeeder::class);
        //$this->call(ProductTagSeeder::class);


        factory(App\Estados::class, 20)->create();
        factory(App\EstadoCivil::class, 10)->create();
         factory(App\User::class, 5)->create();
         factory(App\Paises::class, 10)->create();

         factory(App\Municipios::class, 100)->create();
         factory(App\Colonias::class, 100)->create();

         factory(App\Escuelas::class, 10)->create();
         factory(App\Grados::class, 10)->create();
        factory(App\Idiomas::class, 10)->create();
        factory(App\Carreras::class, 10)->create();
        factory(App\Titulos::class, 10)->create();
        factory(App\DireccionesAreas::class, 6)->create();
        factory(App\DireccionesGenerales::class, 6)->create();
         factory(App\Codigos::class, 10)->create();
         factory(App\Niveles::class, 10)->create();




         factory(App\Usuarios::class, 5)->create();


         factory(App\Solteros::class, 10)->create();
         factory(App\Conyuges::class, 10)->create();
         factory(App\Descensientes::class, 10)->create();
         factory(App\DetalleEscolaridades::class, 10)->create();
         factory(App\DetalleIdiomas::class, 10)->create();
         factory(App\DetalleLaborales::class, 10)->create();
         factory(App\ExpLaborales::class, 10)->create();
         factory(App\Seguros::class, 10)->create();




        DB::table('permissions')->insert([
            'name' => 'import-sistema',
            'display_name' => 'Importar',
            'description' => 'Importar al Sistema',
        ]);

        DB::table('permissions')->insert([
            'name' => 'import-permission',
            'display_name' => 'Importar',
            'description' => 'Importar Permisos',
        ]);

        DB::table('permissions')->insert([
            'name' => 'catalogos-sistema',
            'display_name' => 'Catalagos',
            'description' => 'Sistema de Cátalagos',
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-clientes',
            'display_name' => 'Clientes',
            'description' => 'Clientes',
        ]);




    }
}
