<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLayananKunjunganTahananTable extends Migration
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
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('layanan_kunjungan_tahanan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan_kunjungan_tahanan');
    }
}
