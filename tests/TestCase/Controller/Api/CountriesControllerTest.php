<?php

namespace Dwdm\Cities\Test\TestCase\Controller\Api;

use Cake\TestSuite\IntegrationTestCase;

/**
 * Dwdm\Cities\Controller\Api\CountriesController Test Case
 */
class CountriesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = ['plugin.dwdm/cities.countries'];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $countries = $this->fixtureManager->loaded()['plugin.dwdm/cities.countries']->records;

        $this->get('cities/api/countries.json');

        $this->assertResponseSuccess();
        $this->assertResponseEquals(
            json_encode(
                ['success' => true, 'message' => '', 'errors' => [], 'countries' => $countries],
                JSON_PRETTY_PRINT
            )
        );
    }
}
