<?php
namespace Darsh\Video\Api\Data;


/**
 * Interface TestimonialInterface
 * @package Panda\Testimonial\Api\Data
 */
interface VideoInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */

    const ID                         = 'id';
    const TITLE                      = 'title';
    const VIDEO_DESCRIPTION          = 'video_description';
    const VIDEO_IMAGE                = 'video_image';
    const VIDEO_URL                  = 'video_url';
    const IS_ACTIVE                  = 'is_active';
    const POSITION                   = 'position';
    const CREATION_TIME              = 'creation_time';
    const UPDATE_TIME                = 'update_time';
    const DOWNLOADS_FILE             = 'downloads_file';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get testimonial description
     *
     * @return string
     */
    public function getVideoDescription();

    /**
     * Get testimonial image
     *
     * @return string
     */
    public function getVideoImage();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Get testimonial video url
     *
     * @return string
     */
    public function getVideoUrl();

    public function getPosition();

    /*
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    public function getDownloadsFile();
    /**
     * Set id
     *
     * @param int $id
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $name
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setTitle($title);

    /**
     * Set testimonialDescription
     *
     * @param string $testimonialDescription
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setVideoDescription($videoDescription);

    /**
     * Set Testimonialimage
     *
     * @param string $testimonialImage
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setVideoImage($videoImage);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setIsActive($isActive);

    /**
     * Set videoUrl
     *
     * @param string $videoUrl
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setVideoUrl($videoUrl);

    public function setPosition($position);

    /**
     * Set creationTime
     *
     * @param string $creationTime
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set updateTime
     *
     * @param string $updateTime
     * @return Panda\Testimonial\Api\Data\TestimonialInterface
     */
    public function setUpdateTime($updateTime);

    public function setDownloadsFile($downloadsFile);

}