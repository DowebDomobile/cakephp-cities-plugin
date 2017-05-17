<?php
namespace Dwdm\Cities\Test\TestCase\Controller\Api;

use Cake\TestSuite\IntegrationTestCase;

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

    public function testSearch()
    {
        $this->get('/cities/api/cities/Бар.json');

        $this->assertResponseSuccess();
        $this->assertResponseEquals(
            json_encode(
                [
                    'success' => true,
                    'message' => '',
                    'errors' => [],
                    'cities' => [[
                        'id' => 1,
                        'region_id' => 1,
                        'name' => 'Барнаул',
                        'region' => ['id' => 1, 'country_id' => 1, 'name' => 'Алтайский край']
                    ]]
                ],
                JSON_PRETTY_PRINT
            )
        );
    }

    public function testSearchCaseInsensitive()
    {
        $this->get('/cities/api/cities/бар.json');

        $this->assertResponseSuccess();
        $this->assertResponseEquals(
            json_encode(
                [
                    'success' => true,
                    'message' => '',
                    'errors' => [],
                    'cities' => [[
                        'id' => 1,
                        'region_id' => 1,
                        'name' => 'Барнаул',
                        'region' => ['id' => 1, 'country_id' => 1, 'name' => 'Алтайский край']
                    ]]
                ],
                JSON_PRETTY_PRINT
            )
        );
    }
}
