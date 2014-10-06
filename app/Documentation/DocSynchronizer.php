<?php


namespace Mobydoc\Documentation;

use Mobydoc\Storage\File\FileRepositoryInterface;

class DocSynchronizer
{
    /**
     * @var FileRepositoryInterface
     */
    private $fileRepo;


    /**
     * @param FileRepositoryInterface $fileRepo
     */
    public function __construct(FileRepositoryInterface $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }
} 