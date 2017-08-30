<?php
use Migrations\AbstractMigration;
use Phinx\Db\Table\ForeignKey;

class CreateCitiesCities extends AbstractMigration
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
        $this->table('cities_cities', ['id' => false, 'primary_key' => 'code'])

            ->addColumn('region_code', 'string', ['length' => 2])
            ->addColumn('area_code', 'string', ['length' => 5, 'null' => true])
            ->addColumn('code', 'string', ['length' => 11])
            ->addColumn('name', 'string', ['length' => 120])
            ->addColumn('short', 'string', ['length' => 10])

            ->addForeignKey('region_code', 'cities_regions', 'code',
                ['update' => ForeignKey::CASCADE, 'delete' => ForeignKey::RESTRICT])
            ->addForeignKey('area_code', 'cities_areas', 'code',
                ['update' => ForeignKey::CASCADE, 'delete' => ForeignKey::RESTRICT])

            ->create();
    }
}
