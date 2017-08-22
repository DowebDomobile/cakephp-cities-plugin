<?php
use Migrations\AbstractMigration;

class CreateRegions extends AbstractMigration
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
        $this->table('cities_regions')
            ->addColumn('country_id', 'integer', ['length' => 11, 'default' => null, 'null' => true])
            ->addColumn('name', 'string', ['length' => 100, 'default' => null, 'null' => false])
            ->addForeignKey('country_id', 'cities_countries', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
