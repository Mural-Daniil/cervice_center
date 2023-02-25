<?php

namespace Database\Seeders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create([
            'name' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = User::create([
            'first_name' => 'Даниил',
            'last_name' => 'Мураль',
            'patronymic' => 'Владимирович',
            'number' => '79493379748',
            'email' => 'daniilmur@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user -> assignRole('user');

        // $role = Role::create(['name' => 'super-user']);
        // $role->givePermissionTo(Permission::all());

        $role = Role::create([
            'name' => 'super-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $role->givePermissionTo(Permission::all());

        $superUser = User::create([
            'first_name' => 'Мастер',
            'last_name' => 'Гаджет',
            'patronymic' => 'Суперпользователь',
            'number' => '79493416069',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $superUser -> assignRole('super-user');

        Permission::create([
            'name' => 'show role',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Permission::create([
            'name' => 'show service',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::create([
            'name' => 'manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $role->givePermissionTo('show service');

        $managerUser = User::create([
            'first_name' => 'Мастер',
            'last_name' => 'Гаджет',
            'patronymic' => 'Менеджер',
            'number' => '79493416069',
            'email' => 'manager@manager.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $managerUser -> assignRole('manager');
    }
}
