<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GempaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GempaTable Test Case
 */
class GempaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GempaTable
     */
    public $Gempa;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gempa'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gempa') ? [] : ['className' => 'App\Model\Table\GempaTable'];
        $this->Gempa = TableRegistry::get('Gempa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gempa);

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
