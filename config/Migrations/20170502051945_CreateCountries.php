<?php
use Migrations\AbstractMigration;

class CreateCountries extends AbstractMigration
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
        $this->table('countries')
            ->addColumn('name', 'string', ['length' => 100, 'default' => null, 'null' => false])
            ->create();
    }
}
