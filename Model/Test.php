<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace AHT\Test\Model;

use AHT\Test\Api\Data\TestInterface;
use AHT\Test\Api\Data\TestInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Test extends \Magento\Framework\Model\AbstractModel implements \AHT\Test\Api\Data\TestInterface
{

    protected $testDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'aht_test_test';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param TestInterfaceFactory $testDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \AHT\Test\Model\ResourceModel\Test $resource
     * @param \AHT\Test\Model\ResourceModel\Test\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        TestInterfaceFactory $testDataFactory,
        DataObjectHelper $dataObjectHelper,
        \AHT\Test\Model\ResourceModel\Test $resource,
        \AHT\Test\Model\ResourceModel\Test\Collection $resourceCollection,
        array $data = []
    ) {
        $this->testDataFactory = $testDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve test model with test data
     * @return TestInterface
     */
    public function getDataModel()
    {
        $testData = $this->getData();

        $testDataObject = $this->testDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $testDataObject,
            $testData,
            TestInterface::class
        );

        return $testDataObject;
    }
}
