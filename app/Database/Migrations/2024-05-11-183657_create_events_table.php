<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateEventsTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 11 May, 2024 06:36:57 PM
 */

class CreateEventsTable extends Migration
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
		'status' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'cid' => [
			'type' => 'INT',
			'constraint' => 11,
			'null' => false,
		],
		'etitle' => [
			'type' => 'VARCHAR',
			'constraint' => 150,
			'null' => true,
		],
		'edescp' => [
			'type' => 'LONGTEXT',
			'null' => true,
		],
		'created_at datetime NULL DEFAULT current_timestamp()',
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');

		$this->forge->addKey('cid');
		$this->forge->addKey('status');



        // Create Table ...
        $this->forge->createTable('events');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('events');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}