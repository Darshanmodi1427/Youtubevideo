<?php

namespace Darsh\Video\Block\Adminhtml\Grid\Column;


/**
 * Class Statuses
 * @package Panda\Testimonial\Block\Adminhtml\Grid\Column
 */
class Statuses extends \Magento\Backend\Block\Widget\Grid\Column
{
    /**
     * Add to column decorated status
     *
     * @return array
     */
    public function getFrameCallback()
    {
        return [$this, 'decorateStatus'];
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
    public function decorateStatus($value, $row, $column, $isExport)
    {
        if ($row->getIsActive() || $row->getStatus()) {
            $cell = '<span class="grid-severity-notice"><span>' . $value . '</span></span>';
        } else {
            $cell = '<span class="grid-severity-critical"><span>' . $value . '</span></span>';
        }
        return $cell;
    }
}
