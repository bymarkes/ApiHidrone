<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuari')->delete();
		$usuaris = array(
		['nom' => 'Usuari1', 'cognom' => 'cognom-1','email' => 'email-1@email.com', 'password' => 'pass1', 'alta_usuari' => new DateTime, 'updated_at' => new DateTime],
		['nom' => 'Usuari2', 'cognom' => 'cognom-2','email' => 'email-2@email.com', 'password' => 'pass2', 'alta_usuari' => new DateTime, 'updated_at' => new DateTime],

		);
		DB::table('usuari')->insert($usuaris);
    }
}
