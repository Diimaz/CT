<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTipoIncidente extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idTipoIncidencia'   => [
                'type'           => 'INT',
                'constraint'     => 12,
                'unsigned'       => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'incidencia'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'date_create' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'date_update' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('idTipoIncidencia', true);
        $this->forge->createTable('tbl_tipos_de_incidencia');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_tipos_de_incidencia');
    }
}