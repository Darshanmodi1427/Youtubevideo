<?php
namespace Darsh\Video\Controller\Index;

use \Magento\Framework\App\Action\Action;

class Index extends Action
{
    
  /** @var  \Magento\Framework\View\Result\Page */
  protected $resultPageFactory;
  protected $_orderCollectionFactory;
  protected $customerFactory;
  protected $_customerCollectionFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
         \Magento\Customer\Model\CustomerFactory $customerFactory,
         \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->customerFactory  = $customerFactory;
        $this->_customerCollectionFactory = $customerCollectionFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Testimonials Index, shows a list of testimonials.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
       $collection = $this->_customerCollectionFactory->create()->addAttributeToSelect('*')->addFieldToFilter('group_id', 4);
         foreach ($collection as $customerCollection) {
              $membershipStartDate = $customerCollection->getMembershipStartDate();
               $date2=date_create($membershipStartDate);
               //$date1=date_create(date('Y-m-d')); open for actual code
                $date1 = date_create(date('2018-05-22'));
                $diff=date_diff($date2,$date1);
                $days =  $diff->days;
                //$year = $diff->y; open for actual code
                  //var_dump($days);
                  //die(); //31
                $customerModel= $this->customerFactory->create();
                $customer = $customerModel->load($customerCollection->getId());
                $customerGroupId = $customer->getGroupId();
                 //if($customerGroupId == '4' && $year == 1) // open for actual code
                if($customerGroupId == '4' && $days == 1) // comment this and uncomment above in actual code
                {
                    $customer->setGroupId('1');
                    $customer->save();
                } 

         }
           var_dump("hello");
          die();
        //return $this->resultPageFactory->create();
    }

}