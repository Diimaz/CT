<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user=[
            [
                'nombre'=>'Dimas',
                'apellido'=>'Amaya',
                'usuario'=>'dtdimasamaya1',
                'password'=>password_hash('dimas',PASSWORD_DEFAULT),
                'email'=>'dimas@gmail.com',
                'estado'=> 1,
                'dui'=>'00013545-1',
                'telefono'=>'7570-4365',
                'date_create'=>date('Y-m-d H:i:s'),
                'date_update'=>date('Y-m-d H:i:s'),
                'idRol'=>1
            ],
            [
                'nombre'=>'Brayan',
                'apellido'=>'Amaya',
                'usuario'=>'dtbrayanamaya1',
                'password'=>password_hash('brayan',PASSWORD_DEFAULT),
                'email'=>'brayan@gmail.com',
                'estado'=> 1,
                'dui'=>'00014545-2',
                'telefono'=>'7500-2959',
                'date_create'=>date('Y-m-d H:i:s'),
                'date_update'=>date('Y-m-d H:i:s'),
                'idRol'=>1
            ],
            [
                'nombre'=>'Jaime',
                'apellido'=>'Molina',
                'usuario'=>'dtjaimemolina1',
                'password'=>password_hash('dimas',PASSWORD_DEFAULT),
                'email'=>'jaime@gmail.com',
                'estado'=> 1,
                'dui'=>'00002452-3',
                'telefono'=>'7090-2501',
                'date_create'=>date('Y-m-d H:i:s'),
                'date_update'=>date('Y-m-d H:i:s'),
                'idRol'=>1
            ],
        ];
        $builder = $this->db->table('tbl_usuarios');
        $builder->insertBatch($user);
    }
}