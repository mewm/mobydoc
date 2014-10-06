<?php

namespace Mobydoc\Storage\File;


class FileRepository implements FileRepositoryInterface
{
    /**
     * @author Dennis Micky Jensen <dj@miinto.com>
     *
     * @param      $path
     *
     * @return array
     */
    public function getFileTreeRecursively($path)
    {
        $_fileSubPaths = [];
        $_iterator     = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($_iterator as $item) {
            $_path = $item->isDir() ? [$item->getFilename() => []] : [$item];

            for ($depth = $_iterator->getDepth() - 1; $depth >= 0; $depth--) {
                $_path = [
                    $_iterator->getSubIterator($depth)
                              ->current()
                              ->getFilename() => $_path
                ];
            }
            $_fileSubPaths = array_merge_recursive($_fileSubPaths, $_path);
        }

        return $_fileSubPaths;
    }
} 