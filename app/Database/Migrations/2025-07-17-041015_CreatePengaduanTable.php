<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePelaporanTable extends Migration
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
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'nama' => [
                'type' 		 => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],
            'no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'foto_identitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'isi' => [
                'type'       => 'TEXT',
            ],
            'bukti' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'proses', 'selesai'],
                'default'    => 'pending',
            ],
            "created_at datetime default current_timestamp"
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengaduan');
    }

    public function down()
    {
        $this->forge->dropTable('pengaduan');
    }
}
