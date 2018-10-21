<?php

namespace Darsh\Video\Block\Adminhtml\Video\Edit;

/**
 * Class Tabs
 * @package Panda\Testimonial\Block\Adminhtml\Testimonial\Edit
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('Video_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Video Information'));
    }

    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        return parent::_beforeToHtml();
    }
}