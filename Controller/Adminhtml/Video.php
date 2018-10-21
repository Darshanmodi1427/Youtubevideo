<?php

namespace Darsh\Video\Controller\Adminhtml;


/**
 * Class Testimonial
 * @package Panda\Testimonial\Controller\Adminhtml
 */
class Video extends \Darsh\Video\Controller\Adminhtml\Actions
{
    /**
     * Form session key
     * @var string
     */
    protected $_formSessionKey = 'darsh_video_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey = 'Darsh_Video::video';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass = 'Darsh\Video\Model\Video';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu = 'Darsh_Video:video';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField = 'is_active';

    /**
     * Save request params key
     * @var string
     */
    protected $_paramsHolder = 'post';
}
