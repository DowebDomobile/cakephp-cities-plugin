<?php
namespace Dwdm\Cities\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AreasFixture
 *
 */
class AreasFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cities_areas';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'region_code' => ['type' => 'string', 'length' => 2, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'code' => ['type' => 'string', 'length' => 5, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 120, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'short' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['code'], 'length' => []],
            'cities_areas_region_code' => ['type' => 'foreign', 'columns' => ['region_code'], 'references' => ['cities_regions', 'code'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
            'code' => '9e930648-ca18-4111-8edd-3dd7ab8e62aa',
            'name' => 'Lorem ipsum dolor sit amet',
            'short' => 'Lorem ip'
        ],
    ];
}
