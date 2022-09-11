<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name'              => 'Bruno Rizzo',
            'email'             => 'bruno@email.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'remember_token'    => Str::random(10),
            'role_id'           => Role::create(['name'=>'Administrador'])->id,
        ]);

        User::create([
            'name'              => 'Ananda Cristina',
            'email'             => 'ananda@email.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'remember_token'    => Str::random(10),
            'role_id'           => Role::create(['name'=>'Gerente'])->id,
        ]);

        User::create([
            'name'              => 'Luíza Cristina',
            'email'             => 'luiza@email.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'remember_token'    => Str::random(10),
            'role_id'           => Role::create(['name'=>'Analista'])->id,
        ]);

        Customer::create([
            'name'              => 'José Silva',
            'email'             => 'jose@email.com',
            'mobile'            => '98765-4321',
        ]);

        Customer::create([
            'name'              => 'Márcia Vieira',
            'email'             => 'marcia@email.com',
            'mobile'            => '98742-5561',
        ]);

        Permission::create(['name'=>'usuário-criar']);
        Permission::create(['name'=>'usuário-visualizar']);
        Permission::create(['name'=>'usuário-editar']);
        Permission::create(['name'=>'usuário-excluir']);
        Permission::create(['name'=>'função-criar']);
        Permission::create(['name'=>'função-visualizar']);
        Permission::create(['name'=>'função-editar']);
        Permission::create(['name'=>'função-excluir']);
        Permission::create(['name'=>'associar-permissão']);
        Permission::create(['name'=>'cliente-criar']);
        Permission::create(['name'=>'cliente-visualizar']);
        Permission::create(['name'=>'cliente-editar']);
        Permission::create(['name'=>'cliente-excluir']);
    }
}
