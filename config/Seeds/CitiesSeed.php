<?php
use Migrations\AbstractSeed;
use Dwdm\Cities\Csv;

/**
 * Cities seed.
 */
class CitiesSeed extends AbstractSeed
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
        while ($data = $csv->read('cities.csv', function ($header, $row) {
            return [
                'region_code' => substr($row[0], 0, 2),
                'area_code' => '000' === substr($row[0], 2, 3) ? null : substr($row[0], 0, 5),
                'code' => $row[0],
                'name' => $row[1],
                'short' => $row[2],
            ];
        })) {
            $this->table('cities_cities')
                ->insert($data)
                ->save();
        }

        while ($data = $csv->read('regions.csv', function ($header, $row) {
            if ('г' != $row[2]) {
                return [];
            }

            return [
                'region_code' => substr($row[0], 0, 2),
                'area_code' => null,
                'code' => $row[0],
                'name' => $row[1],
                'short' => $row[2],
            ];
        })) {
            $this->table('cities_cities')
                ->insert($data)
                ->save();
        }
    }
}
