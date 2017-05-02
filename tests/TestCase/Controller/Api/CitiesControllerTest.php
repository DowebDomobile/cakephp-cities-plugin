<?php
namespace Dwdm\Cities\Test\TestCase\Controller\Api;

use Cake\TestSuite\IntegrationTestCase;
use Dwdm\Cities\Controller\Api\CitiesController;

/**
 * Dwdm\Cities\Controller\Api\CitiesController Test Case
 */
class CitiesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dwdm/cities.cities',
        'plugin.dwdm/cities.regions',
        'plugin.dwdm/cities.countries'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $cities = array_slice($this->fixtureManager->loaded()['plugin.dwdm/cities.cities']->records, 0, 2);

        $this->get('cities/api/countries/1/regions/1/cities.json');

        $this->assertResponseSuccess();
        $this->assertResponseEquals(
            json_encode(
                ['success' => true, 'message' => '', 'errors' => [], 'cities' => $cities],
                JSON_PRETTY_PRINT
            )
        );
    }
}
