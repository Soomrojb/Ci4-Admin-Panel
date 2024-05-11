<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreatePermissionsTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 11 May, 2024 06:36:57 PM
 */

class CreatePermissionsTable extends Migration
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
		'title' => [
			'type' => 'VARCHAR',
			'constraint' => 32,
			'null' => false,
		],
		'slug' => [
			'type' => 'VARCHAR',
			'constraint' => 32,
			'null' => false,
		],
		'description' => [
			'type' => 'VARCHAR',
			'constraint' => 60,
			'null' => false,
		],
		'status' => [
			'type' => 'INT',
			'constraint' => 1,
			'null' => false,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');




        // Create Table ...
        $this->forge->createTable('permissions');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('permissions');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}