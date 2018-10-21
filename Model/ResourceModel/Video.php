<?php

namespace Darsh\Video\Model\ResourceModel;

/**
 * Class Testimonial
 * @package Panda\Testimonial\Model\ResourceModel
 */
class Video  extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * Construct
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param string|null $resourcePrefix
     */
    public function __construct(
    	\Magento\Framework\Model\ResourceModel\Db\Context $context,
    	\Magento\Framework\Stdlib\DateTime\DateTime $date,
    	$resourcePrefix = null) 
    {
    	parent::__construct($context, $resourcePrefix);
    	$this->_date = $date;
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
    	$this->_init('darsh_video', 'id');
    }

    /**
     * Process post data before saving
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {

    	if ($object->isObjectNew() && !$object->hasCreationTime()) {
    		$object->setCreationTime($this->_date->gmtDate());
    	}

    	$object->setUpdateTime($this->_date->gmtDate());

    	return parent::_beforeSave($object);
    }

    /**
     * @param \Magento\Framework\Model\AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return $this
     */
    public function load(\Magento\Framework\Model\AbstractModel $object, $value, $field = null)
    {
        return parent::load($object, $value, $field);
    }
}