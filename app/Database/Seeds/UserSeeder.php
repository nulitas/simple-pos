<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role' => 1
            ],
            [
                'username' => 'cashier',
                'password' => password_hash('cashier', PASSWORD_DEFAULT),
                'role' => 2
            ],
            [
                'username' => 'buyer',
                'password' => password_hash('buyer', PASSWORD_DEFAULT),
                'role' => 3
            ]
        ];

        foreach ($data as $user) {
            $this->db->table('users')->insert([
                'username' => $user['username'],
                'password' => $user['password'],
                'role' => $user['role'],
            ]);
        }
    }
}
