<?php

namespace Doofinder\Feed\Test\Unit\Model\Generator;

use Doofinder\Feed\Test\Unit\BaseTestCase;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;

class ComponentFactoryTest extends BaseTestCase
{
    /**
     * @var \Doofinder\Feed\Model\Generator\ComponentFactory
     */
    private $_model;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $_objectManager;

    /**
     * Prepares the environment before running a test.
     */
    public function setUp()
    {
        parent::setUp();

        $this->_objectManager = $this->getMock(
            '\Magento\Framework\ObjectManagerInterface',
            [],
            [],
            '',
            false
        );

        $this->_model = $this->getMock(
            'Doofinder\Feed\Model\Generator\ComponentFactory',
            null,
            [
                'objectManager' => $this->_objectManager,
                'instanceName' => '\Test\Unit\Doofinder\Feed'
            ]
        );
    }

    /**
     * Test create
     */
    public function testCreate()
    {
        $this->_objectManager->expects($this->once())->method('create')
            ->with('\Test\Unit\Doofinder\Feed\Test', ['sample' => 'data']);

        $this->_model->create(['sample' => 'data'], 'Test');
    }
}
