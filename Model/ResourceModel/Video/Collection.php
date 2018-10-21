<?php
namespace Darsh\Video\Model\ResourceModel\Video;


/**
 * Class Collection
 * @package Panda\Testimonial\Model\ResourceModel\Testimonial
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Darsh\Video\Model\Video', 'Darsh\Video\Model\ResourceModel\Video');
    }

}