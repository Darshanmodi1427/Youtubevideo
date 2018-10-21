<?php

namespace Darsh\Video\Block\Adminhtml\Grid\Column;


/**
 * Class Statuses
 * @package Panda\Testimonial\Block\Adminhtml\Grid\Column
 */
class Images extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'imageValue'];
    }

    /**
     * Decorate status column values
     *
     * @param string $value
     * @param  \Magento\Framework\Model\AbstractModel $row
     * @param \Magento\Backend\Block\Widget\Grid\Column $column
     * @param bool $isExport
     * @return string
     */
    public function imageValue($value, $row, $column, $isExport)
    {
        if($value)
        {
            $_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $storeManager = $_objectManager->get('Magento\Store\Model\StoreManagerInterface'); 
            $currentStore = $storeManager->getStore();
            $mediaUrl = $currentStore->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
            $cell = '<img src="'.$mediaUrl.$value.'" alt="'.$row->getTitle().'" height="100"/>';

        }
        else
        {
            $cell = 'No Image';
        }
        return $cell;
       
    }
}
