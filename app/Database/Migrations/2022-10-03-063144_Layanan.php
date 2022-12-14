<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'layanan_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_layanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'estimasi_waktu' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'tarif' => [
                'type' => 'DECIMAL',
                'constraint' => 7,0,
            ],
        ]);
        $this->forge->addKey('layanan_id', true);
        $this->forge->createTable('layanan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan');
    }
}
