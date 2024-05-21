<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterFakultas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('fakultas', [
            'fak_status' => [
            'type' => 'ENUM',
            'constraint' => "'Active','Inactive'",
            'default' => 'Active' ]
            ]);
    }

    public function down()
    {
        //
    }
}
