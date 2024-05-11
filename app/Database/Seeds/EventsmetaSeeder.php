<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use ReflectionException;

/**
 * Short description of this class usages
 * @class EventsmetaSeeder
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Seeds
 * @extend CodeIgniter\Database\Seeder
 * @generated_at 11 May, 2024 06:37:39 PM
 */

class EventsmetaSeeder extends Seeder
{
    /**
     * @throws ReflectionException
     */
    public function run(): void
    {
        // Table Data ...
        $eventsmeta = [
            ['id' => '1','eid' => '1','ekey' => 'image','val' => 'cenm_01.jpg','origname' => '','meta' => '',],
            ['id' => '2','eid' => '1','ekey' => 'image','val' => 'cenm_02.jpg','origname' => '','meta' => '',],
        ];


        // Cleaning up the table before seeding ...
        $this->db->table('eventsmeta')->truncate();

        //Using Query Builder Class ...
        try {
        $this->db->table('eventsmeta')->insertBatch($eventsmeta);
        } catch (ReflectionException $e) {
            throw new ReflectionException($e->getMessage());
        }
    }
}
