<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace AHT\Test\Block\Index;

class Index extends \Magento\Framework\View\Element\Template
{

    /**
     * @param \AHT\Test\Model\TestRepository
     */
    private $_testRepository;

    /**
     * @param \AHT\Test\Model\ResourceModel\Test\CollectionFactory
     */
    private $_testCollection;

    /**
     * @param \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Test\Model\TestRepository $testRepository,
        \AHT\Test\Model\ResourceModel\Test\CollectionFactory $testCollection,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_testRepository = $testRepository;
        $this->_testCollection = $testCollection;
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function getList()
    {
        return $this->_testCollection->create();
    }

    public function perpareEdit()
    {
        $id = $this->_registry->registry('id');
        if ($id != '') {
            $test = $this->_testRepository->get($id);
            return $test;
        } else {
            return null;
        }
    }
}
