<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PiwwMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Piw_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
             'uuid' => [
                'type'       => 'BINARY',
                'constraint' => 16, 
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'content' => [
                'type' => 'TEXT',
            ],
             'image' => [                     
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,       
            ],
            'User_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('uuid',true);
        $this->forge->addKey('Piw_id', true);
        $this->forge->createTable('piwlada');

    }

    public function down()
    {
        $this->forge->dropTable('piwlada');
    }
}