<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateEventsmetaTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 11 May, 2024 06:36:57 PM
 */

class CreateEventsmetaTable extends Migration
{
    public function up()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            
		'id' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
			'auto_increment' => true,
		],
		'eid' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'ekey' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'val' => [
			'type' => 'VARCHAR',
			'constraint' => 150,
			'null' => false,
		],
		'origname' => [
			'type' => 'VARCHAR',
			'constraint' => 120,
			'null' => false,
		],
		'meta' => [
			'type' => 'VARCHAR',
			'constraint' => 10,
			'null' => false,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');

		$this->forge->addKey('eid');



        // Create Table ...
        $this->forge->createTable('eventsmeta');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('eventsmeta');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}