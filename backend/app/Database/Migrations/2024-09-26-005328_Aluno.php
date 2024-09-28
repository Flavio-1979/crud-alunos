<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aluno extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'unique'     => true,
            ],
            'telefone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'endereco' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'foto' => [
                'type'       => 'MEDIUMBLOB',
                'null'       => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('alunos', true);
    }

    public function down()
    {
        $this->forge->dropTable('alunos', true);
    }
}
