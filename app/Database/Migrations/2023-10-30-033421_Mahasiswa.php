<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->db->enableForeignKeyChecks ();
        $this->forge->addField([
        'mhs_id' => ['type'=> 'INT', 'constraint'=>20, 'auto_increment' => TRUE],
        'prodi_id' => ['type'=> 'INT', 'constraint'=>20,],
        'mhs_nama'=> ['type'=> 'VARCHAR', 'constraint' => '200',],
        'mhs_npm'=> ['type'=> 'INT', 'constraint' => '30',],
        ]);
        $this->forge->addKey('mhs_id', TRUE);
        $this->forge->addForeignKey
        ('prodi_id','prodi','prodi_id','CASCADE','CASCADE');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        //
    }
}
