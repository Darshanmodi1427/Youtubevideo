<?php
namespace Darsh\Video\Block;

use Magento\Framework\View\Element\Template;

class VideoDetail extends \Magento\Framework\View\Element\Template
{
    protected $videoFactory;

    public function __construct(
        Template\Context $context,
        \Darsh\Video\Model\VideoFactory $videoFactory,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->videoFactory = $videoFactory;
    }

    public function getVideoDetails()
    {
        $id = $this->getRequest()->getParam('id');
        $videoModel = $this->videoFactory->create()->load($id);
        return $videoModel;
    }

    public function getRelatedVideos(){
        $relatedIds = explode(",",$this->getVideoDetails()->getRelated());
        $videos = $this->videoFactory->create()->getCollection()
                    ->addFieldToFilter('is_active', 1)
                    ->addFieldToFilter('id', ['in' => $relatedIds]);
        
        return $videos;            
    }

    public function getMediaPath()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
}