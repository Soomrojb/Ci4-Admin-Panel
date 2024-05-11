<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class PermsSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:38:00 PM
 */

class PermsSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $perms = [
            ['id' => '1','uid' => '1','pid' => '1','created_at' => '2024-05-03 12:58:32',],
            ['id' => '8','uid' => '2','pid' => '2','created_at' => '2024-05-03 12:58:32',],
            ['id' => '9','uid' => '2','pid' => '3','created_at' => '2024-05-03 12:58:32',],
            ['id' => '10','uid' => '2','pid' => '4','created_at' => '2024-05-03 12:58:32',],
            ['id' => '11','uid' => '2','pid' => '5','created_at' => '2024-05-03 12:58:32',],
            ['id' => '12','uid' => '2','pid' => '6','created_at' => '2024-05-03 12:58:32',],
            ['id' => '13','uid' => '2','pid' => '8','created_at' => '2024-05-03 12:58:32',],
            ['id' => '14','uid' => '2','pid' => '9','created_at' => '2024-05-03 12:58:32',],
            ['id' => '15','uid' => '2','pid' => '10','created_at' => '2024-05-03 12:58:32',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('perms')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('perms')->insertBatch($perms);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
