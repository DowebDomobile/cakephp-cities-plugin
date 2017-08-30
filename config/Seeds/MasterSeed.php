<?php
use Migrations\AbstractSeed;

/**
 * Master seed.
 */
class MasterSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $this->call('RegionsSeed');
        $this->call('AreasSeed');
        $this->call('CitiesSeed');
    }
}
