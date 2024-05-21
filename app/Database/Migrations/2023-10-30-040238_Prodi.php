<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prodi extends Migration
{
    public function up()
    {
        $this->db->enableForeignKeyChecks();
        $this->forge->addField([
        'prodi_id' => [
        'type'=> 'INT', 'constraint'=>20, 'auto_increment' => TRUE],
        'fak_id' => ['type'=> 'INT', 'constraint'=> 20,],
        'prodi_nama'=> ['type'=> 'VARCHAR', 'constraint' => '100',],
        'prodi_akre'=> ['type'=> 'CHAR', 'constraint' => '1', ],
        'prodi_jenj'=> ['type'=> 'VARCHAR', 'constraint' => '5',],
        'prodi_status'=> ['type' => 'ENUM', 'constraint'=>
        "'Active', 'Inactive'", 'default'=> 'Active' ],
        ]);
        $this->forge->addKey('prodi_id', TRUE);
        $this->forge->addForeignKey
        ('fak_id','fakultas','fak_id','CASCADE','CASCADE');
        $this->forge->createTable('prodi');
    }

    public function down()
    {
        //
    }
}
