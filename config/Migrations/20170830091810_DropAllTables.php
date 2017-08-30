<?php
use Migrations\AbstractMigration;

class DropAllTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $this->table('cities_cities')->drop();
        $this->table('cities_regions')->drop();
        $this->table('cities_countries')->drop();
    }
}
