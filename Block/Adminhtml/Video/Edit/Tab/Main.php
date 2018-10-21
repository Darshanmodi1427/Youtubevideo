<?php

namespace Darsh\Video\Block\Adminhtml\Video\Edit\Tab;

/**
 * Class Main
 * @package Panda\Testimonial\Block\Adminhtml\Testimonial\Edit\Tab
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{

    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;
    protected $_videoCollectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Darsh\Video\Model\ResourceModel\Video\CollectionFactory $videoCollectionFactory,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_videoCollectionFactory = $videoCollectionFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }


    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('current_model');

        /*
         * Checking if user have permissions to save information
         */
        $isElementDisabled = !$this->_isAllowedAction('Darsh_Video::video');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Video Information')]);

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'post[title]',
                'label' => __('Title'),
                'title' => __('Title'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );


        $contentField = $fieldset->addField(
            'video_description',
            'editor',
            [
                'name' => 'post[video_description]',
                'label' => __('Video Description'),
                'title' => __('Video Description'),
                'config' => $wysiwygConfig,
                'disabled' => $isElementDisabled,
                'required' => false
            ]
        );


        if (is_array($model->getData('video_image'))) {
            $model->setData('video_image', $model->getData('video_image')['value']);
        }
        $fieldset->addField(
            'video_image',
            'image',
            [
                'title' => __('Video Image'),
                'label' => __('Video Image'),
                'name' => 'post[video_image]',
                'note' => __('Allow image type: jpg, jpeg, gif, png'),
            ]
        );
        $fieldset->addField(
            'video_url',
            'text',
            [
                'name' => 'post[video_url]',
                'label' => __('YouTube Url'),
                'title' => __('YouTube Url'),
                'required' => false,
                'disabled' => $isElementDisabled
            ]
        );
        if (is_array($model->getData('downloads_file'))) {
            $model->setData('downloads_file', $model->getData('downloads_file')['value']);
        }
        $fieldset->addField(
            'downloads_file',
            'file',
            [
            'title' => __('File'),
            'label' => __('File'),
            'name' => 'post[downloads_file]',
            'note' => __('Upload Pdf files only.'),
            ]
            );
        $fieldset->addField(
            'position',
            'text',
            [
                'name' => 'post[position]',
                'label' => __('Position'),
                'title' => __('Position'),
                'required' => false,
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'related',
            'multiselect',
            [
                'label' => __('Related Videos'),
                'title' => __('Related Videos'),
                'name' => 'post[related]',
                'required' => false,
                'values' => $this->getVideos(),
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Video Status'),
                'name' => 'post[is_active]',
                'required' => true,
                'options' => $model->getAvailableStatuses(),
                'disabled' => $isElementDisabled
            ]
        );

        if (!$model->getId()) {
            $model->setData('is_active', $isElementDisabled ? '0' : '1');
        }


        // Setting custom renderer for content field to remove label column
        $renderer = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Form\Renderer\Fieldset\Element'
        );
        $contentField->setRenderer($renderer);

        $this->_eventManager->dispatch('darsh_video_post_edit_tab_main_prepare_form', ['form' => $form]);

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Generate spaces
     * @param  int $n
     * @return string
     */

    protected function getVideos()
    {        
        $collection = $this->_videoCollectionFactory
        ->create()
        ->addFilter('is_active', 1);

        $videos = array();
        if(count($collection) >0){    
            foreach ($collection as $key => $video) {
                $videos[$key]['value']  = $video->getId();
                $videos[$key]['label']  = $video->getTitle();
            }
        }else{
            $videos[0]['value'] = 0;
            $videos[0]['label'] = "No Videos Found";            
        }

        return $videos;
        
    }
        
    protected function _getSpaces($n)
    {
        $s = '';
        for ($i = 0; $i < $n; $i++) {
            $s .= '--- ';
        }

        return $s;
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Video  Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Video Information');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}


