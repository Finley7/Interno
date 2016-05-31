<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchoolTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchoolTable Test Case
 */
class SchoolTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SchoolTable
     */
    public $School;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.school',
        'app.users',
        'app.roles',
        'app.user_role',
        'app.roles_roles_users',
        'app.permissions',
        'app.permissions_roles',
        'app.roles_users',
        'app.primary_role'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('School') ? [] : ['className' => 'App\Model\Table\SchoolTable'];
        $this->School = TableRegistry::get('School', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->School);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
