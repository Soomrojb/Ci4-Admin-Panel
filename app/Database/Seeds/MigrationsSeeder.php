<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class MigrationsSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:37:47 PM
 */

class MigrationsSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $migrations = [
            ['id' => '1','version' => '2024-05-10-191104','class' => 'App\\Database\\Migrations\\CreateEvcategoriesTable','group' => 'default','namespace' => 'App','time' => '1715366069','batch' => '1',],
            ['id' => '2','version' => '2024-05-10-191104','class' => 'App\\Database\\Migrations\\CreateEventsTable','group' => 'default','namespace' => 'App','time' => '1715366069','batch' => '1',],
            ['id' => '3','version' => '2024-05-10-191104','class' => 'App\\Database\\Migrations\\CreateEventsmetaTable','group' => 'default','namespace' => 'App','time' => '1715366069','batch' => '1',],
            ['id' => '4','version' => '2024-05-10-191104','class' => 'App\\Database\\Migrations\\CreatePermissionsTable','group' => 'default','namespace' => 'App','time' => '1715366069','batch' => '1',],
            ['id' => '5','version' => '2024-05-10-191104','class' => 'App\\Database\\Migrations\\CreatePermsTable','group' => 'default','namespace' => 'App','time' => '1715366069','batch' => '1',],
            ['id' => '6','version' => '2024-05-10-191104','class' => 'App\\Database\\Migrations\\CreateUsersTable','group' => 'default','namespace' => 'App','time' => '1715366069','batch' => '1',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('migrations')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('migrations')->insertBatch($migrations);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
