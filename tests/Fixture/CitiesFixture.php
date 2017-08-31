<?php
namespace Dwdm\Cities\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitiesFixture
 *
 */
class CitiesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cities_cities';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'region_code' => ['type' => 'string', 'length' => 2, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'area_code' => ['type' => 'string', 'length' => 5, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'code' => ['type' => 'string', 'length' => 11, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 120, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'short' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['code'], 'length' => []],
            'cities_cities_area_code' => ['type' => 'foreign', 'columns' => ['area_code'], 'references' => ['cities_areas', 'code'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'cities_cities_region_code' => ['type' => 'foreign', 'columns' => ['region_code'], 'references' => ['cities_regions', 'code'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'region_code' => '',
            'area_code' => 'Lor',
            'code' => '1e97ab73-14ec-44a8-84cc-6edaed41f235',
            'name' => 'Lorem ipsum dolor sit amet',
            'short' => 'Lorem ip'
        ],
    ];
}
