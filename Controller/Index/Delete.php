<?php

namespace AHT\Test\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \AHT\Test\Model\TestFactory
     */
    private $_testFactory;

    /**
     * @param \AHT\Test\Model\TestRepository
     */
    private $_testRepository;

    /**
     * @param \Magento\Framework\Controller\ResultFactory
     */
    private $_resultFactory;

    /**
     * @param \Magento\Framework\App\Cache\TypeListInterface
     */
    private $_typeList;

    /**
     * @param \Magento\Framework\App\Cache\Frontend\Pool
     */
    private $_pool;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\Test\Model\TestFactory $testFactory,
        \AHT\Test\Model\TestRepository $testRepository,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        \Magento\Framework\App\Cache\TypeListInterface $typeList,
        \Magento\Framework\App\Cache\Frontend\Pool $pool
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_testFactory = $testFactory;
        $this->_testRepository = $testRepository;
        $this->_resultFactory = $resultFactory;
        $this->_typeList = $typeList;
        $this->_pool = $pool;
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
        $redirect = $this->_resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);

        if ($this->_testRepository->deleteById($request_id)) {
            $redirect->setUrl('/mgto/hello/index/index');
        } else {
            $redirect->setUrl('/mgto/hello/index/index');
        }

        $this->flushCache();

        return $redirect;
    }

    public function flushCache()
    {
        $_types = [
            'config',
            'layout',
            'block_html',
            'collections',
            'reflection',
            'db_ddl',
            'eav',
            'config_integration',
            'config_integration_api',
            'full_page',
            'translate',
            'config_webservice'
        ];

        foreach ($_types as $type) {
            $this->_typeList->cleanType($type);
        }
        foreach ($this->_pool as $cacheFrontend) {
            $cacheFrontend->getBackend()->clean();
        }
    }
}
