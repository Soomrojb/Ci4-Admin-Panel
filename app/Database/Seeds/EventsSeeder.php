<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class EventsSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:37:34 PM
 */

class EventsSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $events = [
            ['id' => '1','status' => '1','cid' => '1','etitle' => 'Demonstration','edescp' => '','created_at' => '2024-04-29 08:52:34',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('events')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('events')->insertBatch($events);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
