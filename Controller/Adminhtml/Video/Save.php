<?php
namespace Darsh\Video\Controller\Adminhtml\Video;

use Darsh\Video\Model\Video;


/**
 * Class Save
 * @package Panda\Testimonial\Controller\Adminhtml\Testimonial
 */
class Save extends \Darsh\Video\Controller\Adminhtml\Video
{
    /**
     * @param $model
     * @param $request
     */
    protected function _beforeSave($model, $request)
    {

        $data = $model->getData();
        if (array_key_exists("related",$data))
        {
           if($data['related'] != NULL){
            $data['related'] = implode(",",$data['related']);
        }
    }
    
    
    $model->setData($data);

    /* prepare Testimonial image */
    $imageField = 'video_image';
    $downloadsField = 'downloads_file';
    $fileSystem = $this->_objectManager->create('Magento\Framework\Filesystem');
    $mediaDirectory = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);


    if (isset($data[$imageField]) && isset($data[$imageField]['value'])) {
        if (isset($data[$imageField]['delete'])) {
            unlink($mediaDirectory->getAbsolutePath() . $data[$imageField]['value']);
            $model->setData($imageField, '');
        } else {
            $model->unsetData($imageField);
        }
    }

    /*code foe file*/
    if (isset($data[$downloadsField]) && isset($data[$downloadsField]['value'])) {
        if (isset($data[$downloadsField]['delete'])) {
            unlink($mediaDirectory->getAbsolutePath() . $data[$downloadsField]['value']);
            $model->setData($downloadsField, '');
        } else {
            $model->unsetData($downloadsField);
        }
    }
    /*code for file end*/

    try {
       if(isset($_FILES['post']['name']['video_image']) && $_FILES['post']['name']['video_image'] != "")
       {
        $uploader = $this->_objectManager->create('Magento\MediaStorage\Model\File\UploaderFactory');
        $uploader = $uploader->create(['fileId' => 'post[' . $imageField . ']']);
        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
        $uploader->setAllowRenameFiles(true);
        $uploader->setFilesDispersion(true);
        $uploader->setAllowCreateFolders(true);
        $result = $uploader->save(
            $mediaDirectory->getAbsolutePath(Video::BASE_MEDIA_PATH)
        );
        $model->setData($imageField, Video::BASE_MEDIA_PATH . $result['file']);
    }
    /*image code end*/
    if(isset($_FILES['post']['name']['downloads_file']) && $_FILES['post']['name']['downloads_file'] != "")
    {
        $uploaderfile = $this->_objectManager->create('Magento\MediaStorage\Model\File\UploaderFactory');
        $uploaderfile = $uploaderfile->create(['fileId' => 'post[' . $downloadsField . ']']);
        $uploaderfile->setAllowedExtensions(['doc','pdf','docx']);
        $uploaderfile->setAllowRenameFiles(true);
        $uploaderfile->setFilesDispersion(true);
        $uploaderfile->setAllowCreateFolders(true);
        $result = $uploaderfile->save(
            $mediaDirectory->getAbsolutePath(Video::BASE_MEDIA_PATH)
        );
        $model->setData($downloadsField, Video::BASE_MEDIA_PATH . $result['file']);
    }

} catch (\Exception $e) {
    if ($e->getCode() != \Magento\Framework\File\Uploader::TMP_NAME_EMPTY) {
        throw new FrameworkException($e->getMessage());
    }
}
}

}