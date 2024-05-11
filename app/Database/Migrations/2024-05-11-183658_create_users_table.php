<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateUsersTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 11 May, 2024 06:36:57 PM
 */

class CreateUsersTable extends Migration
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
		'firstname' => [
			'type' => 'VARCHAR',
			'constraint' => 50,
			'null' => false,
		],
		'lastname' => [
			'type' => 'VARCHAR',
			'constraint' => 50,
			'null' => false,
		],
		'email' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
		'password' => [
			'type' => 'VARCHAR',
			'constraint' => 120,
			'null' => false,
		],
		'status' => [
			'type' => 'INT',
			'constraint' => 1,
			'null' => false,
		],
		'isadmin' => [
			'type' => 'INT',
			'constraint' => 1,
			'null' => false,
		],
		'created_at timestamp NULL DEFAULT current_timestamp()',
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');




        // Create Table ...
        $this->forge->createTable('users');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('users');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}