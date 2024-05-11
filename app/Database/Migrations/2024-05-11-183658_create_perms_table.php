<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreatePermsTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 11 May, 2024 06:36:57 PM
 */

class CreatePermsTable extends Migration
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
		'uid' => [
			'type' => 'INT',
			'constraint' => 3,
			'null' => false,
		],
		'pid' => [
			'type' => 'INT',
			'constraint' => 3,
			'null' => false,
		],
		'created_at timestamp NULL DEFAULT current_timestamp()',
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');

		$this->forge->addKey([ 'pid', 'uid']);



        // Create Table ...
        $this->forge->createTable('perms');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('perms');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}