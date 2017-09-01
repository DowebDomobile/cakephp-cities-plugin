<?php
use Migrations\AbstractSeed;
use Dwdm\Cities\Csv;

/**
 * Fias seed.
 */
class FiasSeed extends AbstractSeed
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

        $table = $this->table('fias');

        while ($data = $csv->read('regions.csv', function ($head, $row) {
            return [
                'code' => $row[0],
                'name' => $row[1],
                'short' => $row[2],
                'is_locality' => (int)('г' === $row[2]),
            ];
        })) {
            $table->insert($data)->save();
        }

        while ($data = $csv->read('areas.csv', function ($head, $row) {
            return [
                'code' => $row[0],
                'region_code' => (substr($row[0], 0, 2) . '000000000'),
                'name' => $row[1],
                'short' => $row[2],
                'is_locality' => 0,
            ];
        })) {
            $table->insert($data)->save();
        }

        while ($data = $csv->read('cities.csv', function ($head, $row) {
            return [
                'code' => $row[0],
                'region_code' => substr($row[0], 0, 2) . '000000000',
                'area_code' => substr($row[0], 2, 3) === '000' ? null : (substr($row[0], 0, 5) . '000000'),
                'name' => $row[1],
                'short' => $row[2],
                'is_locality' => 1,
            ];
        })) {
            $table->insert($data)->save();
        }
    }
}
