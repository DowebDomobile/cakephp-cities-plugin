<?php
use Migrations\AbstractSeed;
use Dwdm\Cities\Csv;

/**
 * Areas seed.
 */
class AreasSeed extends AbstractSeed
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
        $csv = new Csv(implode(DS, [__DIR__, 'data', '']));
        while ($data = $csv->read('areas.csv', function ($header, $row) {
            return [
                'region_code' => substr($row[0], 0, 2),
                'code' => substr($row[0], 0, 5),
                'name' => $row[1],
                'short' => $row[2],
            ];
        })) {
                $this->table('cities_areas')
                    ->insert($data)
                    ->save();
        }
    }
}
