<?php
use Migrations\AbstractMigration;

class CreateCitiesRegions extends AbstractMigration
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
        $this->table('cities_regions', ['id' => false, 'primary_key' => 'code'])

            ->addColumn('code', 'string', ['length' => 2])
            ->addColumn('name', 'string', ['length' => 120])
            ->addColumn('short', 'string', ['length' => 10])

            ->create();
    }
}
