<?php

namespace AHT\Test\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Framework\Registry
     */
    private $_registry;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Registry $registry

    ) {
        $this->_pageFactory = $pageFactory;
        $this->_registry = $registry;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $request_id = $this->_request->getParam('id');
        $this->_registry->register('id', $request_id);
        return $this->_pageFactory->create();
    }
}
