<?php
namespace Dwdm\Cities\Test\TestCase\Controller\Api;

use Cake\TestSuite\IntegrationTestCase;
use Dwdm\Cities\Controller\Api\RegionsController;

/**
 * Dwdm\Cities\Controller\Api\RegionsController Test Case
 */
class RegionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dwdm/cities.regions',
        'plugin.dwdm/cities.countries',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $regions = array_slice($this->fixtureManager->loaded()['plugin.dwdm/cities.regions']->records, 0, 2);

        $this->get('cities/api/countries/1/regions.json');

        $this->assertResponseSuccess();
        $this->assertResponseEquals(
            json_encode(
                ['success' => true, 'message' => '', 'errors' => [], 'regions' => $regions],
                JSON_PRETTY_PRINT
            )
        );
    }
}
