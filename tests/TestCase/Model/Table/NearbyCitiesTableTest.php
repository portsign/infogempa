<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NearbyCitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NearbyCitiesTable Test Case
 */
class NearbyCitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NearbyCitiesTable
     */
    public $NearbyCities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nearby_cities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NearbyCities') ? [] : ['className' => 'App\Model\Table\NearbyCitiesTable'];
        $this->NearbyCities = TableRegistry::get('NearbyCities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NearbyCities);

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
