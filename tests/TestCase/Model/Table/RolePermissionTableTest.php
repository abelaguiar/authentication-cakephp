<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolePermissionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolePermissionTable Test Case
 */
class RolePermissionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolePermissionTable
     */
    public $RolePermission;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RolePermission',
        'app.Roles',
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
        $config = TableRegistry::getTableLocator()->exists('RolePermission') ? [] : ['className' => RolePermissionTable::class];
        $this->RolePermission = TableRegistry::getTableLocator()->get('RolePermission', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RolePermission);

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
