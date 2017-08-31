<?php
namespace Dwdm\Cities\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Dwdm\Cities\Model\Table\AreasTable;

/**
 * Dwdm\Cities\Model\Table\AreasTable Test Case
 */
class AreasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dwdm\Cities\Model\Table\AreasTable
     */
    public $Areas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.dwdm/cities.areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Areas') ? [] : ['className' => AreasTable::class];
        $this->Areas = TableRegistry::get('Areas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Areas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
