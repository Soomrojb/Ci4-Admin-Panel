<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class UsersSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:38:06 PM
 */

class UsersSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $users = [
            ['id' => '1','firstname' => 'Dummy','lastname' => 'Admin','email' => 'admin@dummy.site','password' => '$2y$10$SMOhw3SV4X9A35T8PE6x7.JvsovwjB6hntxOf26V7uDzXH3KQBdgW','status' => '1','isadmin' => '1','created_at' => '2024-05-03 12:06:36',],
            ['id' => '2','firstname' => 'Webmaster','lastname' => 'Admin','email' => 'webmaster@dummy.site','password' => '$2y$10$SMOhw3SV4X9A35T8PE6x7.JvsovwjB6hntxOf26V7uDzXH3KQBdgW','status' => '1','isadmin' => '0','created_at' => '2024-05-03 12:06:36',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('users')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('users')->insertBatch($users);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
