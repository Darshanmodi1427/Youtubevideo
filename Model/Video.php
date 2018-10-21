<?php

namespace Darsh\Video\Model;

use Darsh\Video\Api\Data\VideoInterface;
use Magento\Framework\DataObject\IdentityInterface;

/**
 * Class Testimonial
 * @package Panda\Testimonial\Model
 */
class Video extends \Magento\Framework\Model\AbstractModel implements VideoInterface, IdentityInterface
{

    /**
     * base media path for testimonial's image
     */
    const BASE_MEDIA_PATH = 'darsh_video';

    /**
     * Testimonial's Status Enabled
     */
    const STATUS_ENABLED = 1;
    /**
     * Testimonial's Status Disabled
     */
    const STATUS_DISABLED = 0;

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'darsh_video';

    /**
     * @var string
     */
    protected $_cacheTag = 'darsh_video';

    /**
     * Prefix of model testimonial names
     *
     * @var string
     */
    protected $_eventPrefix = 'darsh_video';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */

    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);

    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Darsh\Video\Model\ResourceModel\Video');
    }

    /**
     * Retrive Model Title
     * @param  boolean $plural
     * @return string
     */
    public function getOwnTitle($plural = false)
    {
        return $plural ? 'Videos' : 'Video';
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get NAME
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Get Testimonial description
     * @return string|null
     */
    public function getVideoDescription()
    {
        return $this->getData(self::VIDEO_DESCRIPTION);
    }

    /**
     * @return string|null
     */
    public function getVideoImage()
    {

        return $this->getData(self::VIDEO_IMAGE);

    }

    /**
     * Retrieve true if Testimonial is active
     * @return boolean [description]
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Get VideoUrl
     *
     * @return string|null
     */
    public function getVideoUrl()
    {
        return $this->getData(self::VIDEO_URL);
    }

     public function getPosition()
     {
        return $this->getData(self::POSITION);
     }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

     public function getDownloadsFile()
    {
        return $this->getData(self::DOWNLOADS_FILE);
    }

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    /**
     * Set id
     *
     * @param int $id
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Set testimonial description
     *
     * @param string $testimonialDescription
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setVideoDescription($videoDescription)
    {
        return $this->setData(self::VIDEO_DESCRIPTION, $videoDescription);
    }

    /**
     * Set testimonial image
     *
     * @param string $testimonialImage
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setVideoImage($videoImage)
    {
        return $this->setData(self::VIDEO_IMAGE, $videoImage);
    }

    /**
     * Set VideoUrl
     *
     * @param string $videoUrl
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setVideoUrl($videoUrl)
    {

        return $this->setData(self::VIDEO_URL, $videoUrl);
    }

    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * Set event creation time
     *
     * @param string $creation_time
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }

    /**
     * Set update time
     *
     * @param string $update_time
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setUpdateTime($update_time)
    {
        return $this->setData(self::UPDATE_TIME, $update_time);
    }

    public function setDownloadsFile($downloadsFile)
    {
        return $this->setData(self::DOWNLOADS_FILE, $downloadsFile);
    }


    /**
     * Set is active
     *
     * @param int|bool $is_active
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setIsActive($is_active)
    {
        return $this->setData(self::IS_ACTIVE, $is_active);
    }
}