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
        $nombres = ["José", "Pedro", "Raúl", "María", "Luisa", "Adriana", "Angela", "Alan", "Alberto", "Mariana", "Angela", "Jhon"];
        $apellidos = ["Pérez", "Rodriguez", "Hernández", "Martínez", "García", "Marín", "Sánchez", "Smith", "Rivera", "Alderson", "Mas"];

        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            "name" => "Administrador",
            "email" => "admin@admin.com",
            "password" => bcrypt('contraseña')
        ]);

        $nombreEmpresas = ["Git", "Nasa", "Google"];
        $emailEmpresas = ["git@git.com", "nasa@nasa.com", "google@gmail.com"];
        $logoEmpresas = ["git.png", "nasa.webp", "google.webp"];
        $webEmpresas = ["https://github.com", "https://www.nasa.gov", "https://www.google.es"];

        for($i = 1; $i<=sizeof($nombreEmpresas); $i++){
            DB::table('empresas')->insert([
                'name' => $nombreEmpresas[$i-1],
                'email' => $emailEmpresas[$i-1],
                'logo' => $logoEmpresas[$i-1],
                'web' => $webEmpresas[$i-1]
            ]);
        }

        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

        for($i = 1; $i<=2; $i++){
            for($a = 1; $a<=11; $a++){
                $nombre = $nombres[mt_rand(0, count($nombres) - 1)];
                $apellido = $apellidos[mt_rand(0, count($apellidos) - 1)]." ".$apellidos[mt_rand(0, count($apellidos) - 1)];
                $email = $nombre."_".$a."".$i."@gmail.com";

                $email = utf8_decode($email);
                $email = strtr($email, utf8_decode($originales), $modificadas);
                $email = strtolower($email);
                $email = utf8_encode($email);
                $tlfn = rand(100000000,999999999);

                DB::table("empleados")->insert([
                    'nombre' =>  $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'telefono' => $tlfn,
                    'empresa_id' => $i
                ]);
            }
        }

    }
}
/*
    $table->string('nombre');
    $table->string('apellido');
    $table->string('email')->unique();

    $table->integer('empresa_id');
*/
