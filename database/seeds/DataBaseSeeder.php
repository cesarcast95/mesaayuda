<?php

use Illuminate\Database\Seeder;

class DataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'rol',
            // 'permiso',
            'users',
            'usuario_rol',
            //'state',
            'dependence',
            'os',
            'brand',
            'state_device'
            //'category_hardware'
        ]);
        $this->call(DependenceTableSeeder::class);
        $this->call(TablaRolSeeder::class);
        // $this->call(PermisoTableSeeder::class);
        $this->call(UsuarioAdministradorSeeder::class);
        //$this->call(StateSeeder::class);
        $this->call(DependenceTableSeeder::class);
        $this->call(SistemaOperativoSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(StateDeviceSeeder::class);
        $this->call(StateSeeder::class);
        //$this->call(CategorySeeder::class);


    }
    //Se truncan las tablas para no permitir repetición de registros, así también evitamos errores, no hacer esto en producción(NUNCA)
    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
