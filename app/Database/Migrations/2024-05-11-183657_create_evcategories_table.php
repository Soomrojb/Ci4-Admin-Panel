<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Short description of this class usages
 * @class CreateEvcategoriesTable
 * @generated_by RobinNcode\db_craft
 * @package App\Database\Migrations
 * @extend CodeIgniter\Database\Migration
 * @generated_at 11 May, 2024 06:36:57 PM
 */

class CreateEvcategoriesTable extends Migration
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
		'ectitle' => [
			'type' => 'LONGTEXT',
			'null' => true,
		],
		'ecslug' => [
			'type' => 'VARCHAR',
			'constraint' => 50,
			'null' => false,
		],
		'image' => [
			'type' => 'VARCHAR',
			'constraint' => 80,
			'null' => false,
		],
	    ]);

	    // table keys ...
        
		$this->forge->addPrimaryKey('id');


		$this->forge->addUniqueKey('ecslug');


        // Create Table ...
        $this->forge->createTable('evcategories');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
	}

    //--------------------------------------------------------------------

    public function down()
    {
        // disable foreign key check ...
        $this->db->disableForeignKeyChecks();

        // Drop Table ...
        $this->forge->dropTable('evcategories');

        //enable foreign key check ...
        $this->db->enableForeignKeyChecks();
    }
}