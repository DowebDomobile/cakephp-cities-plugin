<?php
namespace Dwdm\Cities\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Dwdm\Cities\View\Helper\FiasHelper;

/**
 * Dwdm\Cities\View\Helper\FiasHelper Test Case
 */
class FiasHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Dwdm\Cities\View\Helper\FiasHelper
     */
    public $Fias;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Fias = new FiasHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fias);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
