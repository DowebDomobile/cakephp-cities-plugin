<?php
use Migrations\AbstractMigration;
use Phinx\Db\Table\ForeignKey;

class CreateCitiesAreas extends AbstractMigration
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
        $this->table('cities_areas', ['id' => false, 'primary_key' => 'code'])

            ->addColumn('region_code', 'string', ['length' => 2])
            ->addColumn('code', 'string', ['length' => 5])
            ->addColumn('name', 'string', ['length' => 120])
            ->addColumn('short', 'string', ['length' => 10])

            ->addForeignKey('region_code', 'cities_regions', 'code',
                ['update' => ForeignKey::CASCADE, 'delete' => ForeignKey::RESTRICT])

            ->create();
    }
}
