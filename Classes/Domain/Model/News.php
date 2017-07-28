<?php

namespace GeorgRinger\NewsGallery\Domain\Model;

class News extends \GeorgRinger\News\Domain\Model\News {

    /**
     * @var string
     */
    protected $txGalleryCollections = '';

    /**
     * @var int
     */
    protected $txGalleryStorage = 0;

    /**
     * @var string
     */
    protected $txGalleryFolder = '';

    /**
     * @return string
     */
    public function getTxGalleryCollections()
    {
        return $this->txGalleryCollections;
    }

    /**
     * @param string $txGalleryCollections
     */
    public function setTxGalleryCollections($txGalleryCollections)
    {
        $this->txGalleryCollections = $txGalleryCollections;
    }

    /**
     * @return int
     */
    public function getTxGalleryStorage()
    {
        return $this->txGalleryStorage;
    }

    /**
     * @param int $txGalleryStorage
     */
    public function setTxGalleryStorage($txGalleryStorage)
    {
        $this->txGalleryStorage = $txGalleryStorage;
    }

    /**
     * @return string
     */
    public function getTxGalleryFolder()
    {
        return $this->txGalleryFolder;
    }

    /**
     * @param string $txGalleryFolder
     */
    public function setTxGalleryFolder($txGalleryFolder)
    {
        $this->txGalleryFolder = $txGalleryFolder;
    }


}
