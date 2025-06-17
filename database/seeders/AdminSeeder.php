<?php

// database/seeders/AdminSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat Permissions
        $permissions = [
            'view buku tamu',
            'create gerai',
            // Tambah sesuai kebutuhan
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password123')]
        );

        // Assign Role & Permission
        $admin->assignRole($adminRole);
        $admin->givePermissionTo($permissions);
    }
}

