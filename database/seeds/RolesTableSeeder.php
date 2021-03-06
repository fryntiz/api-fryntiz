<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id - name - display_name - created_at - updated_at

        try {
            ## Creo rol para administrador
            DB::table('translations')->insert([
                'language_id' => 1,
                'token' => 1,
                'text' => 'Administrador',
            ]);

            DB::table('users_roles')->insert([
                'name' => 'admin',
                'translation_display_name_token' => 1,
            ]);

            ## Creo rol para usuario normal
            DB::table('translations')->insert([
                'language_id' => 1,
                'token' => 2,
                'text' => 'Usuario Normal',
            ]);

            DB::table('users_roles')->insert([
                'name' => 'user',
                'translation_display_name_token' => 2,
            ]);
        } catch (Exception $e) {
            Log::info('Ya existían los roles y traducciones');
        }
    }
}
