<?php

namespace Darsh\Video\Block\Adminhtml;

/**
 * Class Testimonial
 * @package Panda\Testimonial\Block\Adminhtml
 */
class Video extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_blockGroup = 'Darsh_Video';
        $this->_controller = 'adminhtml';
        $this->_headerText = __('Video');
        $this->_addButtonLabel = __('Add New Video');
        parent::_construct();
    }
}
