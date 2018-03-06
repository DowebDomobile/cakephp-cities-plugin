<?php
use Migrations\AbstractMigration;

class AddAreaNameAndCountryToCities extends AbstractMigration
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
        $this->table('cities')

            ->addColumn('area_name', 'string', ['length' => 100, 'default' => null, 'null' => true])
            ->addColumn('country_id', 'integer', ['null' => true])

            ->addForeignKey('country_id', 'countries', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])

            ->update();
    }
}
