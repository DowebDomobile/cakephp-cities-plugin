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
        $csv = new Csv(
            implode(
                DS,
                [
                    'zip:/',
                    ROOT,
                    'vendor/x88/i18nGeoNamesDB/i18n_GeoCSVDump_with_header_qouted_delimiter_comma_v0.4.zip#'
                ]
            )
        );

        $map = ['id' => 'city_id', 'region_id' => 'region_id', 'name' => 'title_ru'];
        while ($data = $csv->read('_cities.csv', $map)) {
            $this->table('cities')
                ->insert($data)
                ->save();
        }
    }
}
