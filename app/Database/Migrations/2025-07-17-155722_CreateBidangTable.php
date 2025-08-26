<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBidangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'slug' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 20,
            ],
            'tugas' => [
                'type'       => 'TEXT'
            ],
            'fungsi' => [
                'type'       => 'TEXT'
            ],
            'nama_kepala' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'struktural' => [
                'type'       => 'TEXT'
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bidang');
    }

    public function down()
    {
        $this->forge->dropTable('bidang');
    }
}
