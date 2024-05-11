<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class EvcategoriesSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:37:24 PM
 */

class EvcategoriesSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $evcategories = [
            ['id' => '1','ectitle' => 'Demonstration','ecslug' => 'demonstration','image' => 'cenm_01.jpg',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('evcategories')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('evcategories')->insertBatch($evcategories);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
