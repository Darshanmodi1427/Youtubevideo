<?php
namespace Darsh\Video\Controller\Index;
use \Magento\Framework\App\Action\Action;

/**
 * Class Index
 * @package Needsaf\Membership\Controller\Index
 */
class View extends Action
{

    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        //$resultPage->getConfig()->getTitle()->set(__('My Video Details'));
        //var_dump("details here");
        // $navigationBlock = $resultPage->getLayout()->getBlock('customer_account_navigation');
        // if ($navigationBlock) {
        //     $navigationBlock->setActive('inquiry/index');
        // }
        return $resultPage;
    }

}