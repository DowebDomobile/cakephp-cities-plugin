<?php
namespace Dwdm\Cities\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegionsFixture
 *
 */
class RegionsFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cities_regions';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'code' => ['type' => 'string', 'length' => 2, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 120, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'short' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['code'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        ['code' => '22', 'name' => 'Алтайский', 'short' => 'край'],
        ['code' => '04', 'name' => 'Алтай', 'short' => 'Респ'],
        ['code' => '01', 'name' => 'Адыгея', 'short' => 'Респ'],
    ];
}
