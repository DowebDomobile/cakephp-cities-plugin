<?php
use Migrations\AbstractSeed;
use Dwdm\Cities\Csv;

/**
 * Countries seed.
 */
class CountriesSeed extends AbstractSeed
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

        $map = ['id' => 'country_id', 'name' => 'title_ru'];
        while ($data = $csv->read('_countries.csv', $map)) {
            $this->table('cities_countries')
                ->insert($data)
                ->save();
        }
    }
}
