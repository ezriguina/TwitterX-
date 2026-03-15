<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CommentMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Com_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'User_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
             'uuid' => [
                'type'       => 'BINARY',
                'constraint' => 16, 
            ],
            'Piw_id' => [
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

        $this->forge->addKey('Com_id', true);
        $this->forge->createTable('coments');
    }

    public function down()
    {
        $this->forge->dropTable('coments');
    }
}