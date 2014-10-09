<?php

namespace Mobydoc\Storage\Document;

use Mobydoc\Document;

interface DocumentRepositoryInterface
{
	/**
     * @author Dennis Micky Jensen <dj@miinto.com>
     *
     * @param $path
     *
     * @return mixed
     */
    public function getByPath($path);


	/**
     * @author Dennis Micky Jensen <dj@miinto.com>
     * @return Document[]
     */
    public function getAll();


	/**
     * @author Dennis Micky Jensen <dj@miinto.com>
     * @return Document[]
     */
    public function getLatestDocumentRevisions();


	/**
     * @author Dennis Micky Jensen <dj@miinto.com>
     *
     * @param $document
     *
     * @return mixed
     */
    public function save($document);


	/**
     * @author Dennis Micky Jensen <dj@miinto.com>
     * @return Document[]
     */
    public function getAllIndexedByPath();
}