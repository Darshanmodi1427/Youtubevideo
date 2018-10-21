<?php
namespace Darsh\Video\Block;

use Magento\Store\Model\ScopeInterface;
use Darsh\Video\Api\Data\TestimonialInterface;
use Darsh\Video\Model\ResourceModel\Video\Collection as VideoCollection;

/**
 * Class TestimonialList
 * @package Panda\Testimonial\Block
 */
class VideoList extends \Magento\Framework\View\Element\Template 
{
    /**
     * @var \Panda\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory
     */
    protected $_videoCollectionFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Panda\Testimonial\Model\ResourceModel\Testimonial\CollectionFactory $testimonialCollectionFactory ,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Darsh\Video\Model\ResourceModel\Video\CollectionFactory $videoCollectionFactory,
        array $data = []
        )

    {
        parent::__construct($context, $data);
        $this->_videoCollectionFactory = $videoCollectionFactory;
        //$this->_isScopePrivate = true;
    }

    protected function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set('Videos');

        return parent::_prepareLayout();
    }
    /**
     * @return \Panda\Testimonial\Model\ResourceModel\Testimonial\Collection
     */
    public function getVideo()
    {

        $videos = $this->_videoCollectionFactory
        ->create()
        ->addFilter('is_active', 1)->addFieldToFilter(
                'video_image',
                ['neq' => NULL]
            );
        return $videos;
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    // public function getIdentities()
    // {
    //     return [\Darsh\Video\Model\Video::CACHE_TAG . '_' . 'list'];
    // }

    /**
     * Return media path
     * @return string|null
     */
    public function getMediaPath()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }

}