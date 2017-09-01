<?php

use Migrations\AbstractMigration;
use Phinx\Db\Table\ForeignKey;

class CreateFias extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('fias', ['id' => false, 'primary_key' => 'code'])

            ->addColumn('code', 'string', ['length' => 11])
            ->addColumn('region_code', 'string', ['length' => 11, 'null' => true])
            ->addColumn('area_code', 'string', ['length' => 11, 'null' => true])
            ->addColumn('name', 'string', ['length' => 120])
            ->addColumn('short', 'string', ['length' => 10])
            ->addColumn('is_locality', 'boolean')

            ->addForeignKey('region_code', 'fias', 'code',
                ['update' => ForeignKey::CASCADE, 'delete' => ForeignKey::SET_NULL])
            ->addForeignKey('area_code', 'fias', 'code',
                ['update' => ForeignKey::CASCADE, 'delete' => ForeignKey::SET_NULL])

            ->create();
    }
}
