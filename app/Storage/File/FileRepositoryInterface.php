<?php
namespace Mobydoc\Storage\File;

interface FileRepositoryInterface
{
	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param      $path
	 *
	 * @return array
	 */
	public function getFileTreeRecursively($path);
}