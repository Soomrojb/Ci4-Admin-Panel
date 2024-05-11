<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class PermissionsSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:37:53 PM
 */

class PermissionsSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $permissions = [
            ['id' => '1','title' => 'Super Admin','slug' => 'super-admin','description' => 'Super admin has all permissions','status' => '1',],
            ['id' => '2','title' => 'Add event','slug' => 'add-event','description' => 'Add event','status' => '1',],
            ['id' => '3','title' => 'Remove event','slug' => 'remove-event','description' => 'Remove previously available event','status' => '1',],
            ['id' => '4','title' => 'Update event','slug' => 'update-event','description' => 'Update previously available event','status' => '1',],
            ['id' => '5','title' => 'View events','slug' => 'view-events','description' => 'View previously available events','status' => '1',],
            ['id' => '6','title' => 'Add Category','slug' => 'add-category','description' => 'Aiew category','status' => '1',],
            ['id' => '8','title' => 'Remove Category','slug' => 'remove-category','description' => 'Remove category','status' => '1',],
            ['id' => '9','title' => 'Update Category','slug' => 'update-category','description' => 'Update category','status' => '1',],
            ['id' => '10','title' => 'View Categories','slug' => 'view-categories','description' => 'View categories','status' => '1',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('permissions')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('permissions')->insertBatch($permissions);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
