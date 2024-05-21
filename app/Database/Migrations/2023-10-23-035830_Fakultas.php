<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fakultas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'fak_id' => ['type' => 'INT', 'constraint' => 20,
            'auto_increment' => TRUE ],
            'fak_nama' => ['type' => 'VARCHAR', 'constraint' => '200'],
            'fak_jmlprodi'=> ['type' => 'int', 'constraint' => '5' ],
            'fak_lokasi' => ['type' => 'VARCHAR', 'constraint' => '20' ],
            ]);
            $this->forge->addKey('fak_id', TRUE);
            $this->forge->createTable('fakultas');
    }

    public function down()
    {
        //
    }
}
