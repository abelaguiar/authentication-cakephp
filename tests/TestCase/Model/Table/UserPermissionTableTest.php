<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserPermissionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserPermissionTable Test Case
 */
class UserPermissionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserPermissionTable
     */
    public $UserPermission;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UserPermission',
        'app.Users',
        'app.Permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UserPermission') ? [] : ['className' => UserPermissionTable::class];
        $this->UserPermission = TableRegistry::getTableLocator()->get('UserPermission', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserPermission);

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
