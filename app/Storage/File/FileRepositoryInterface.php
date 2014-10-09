<?php
namespace Mobydoc\Storage\File;

use SplFileInfo;

interface FileRepositoryInterface
{
	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param      $path
	 *
	 * @return \SplFileInfo[]
	 */
	public function getFileTreeRecursively($path);


	/**
	 * @author   Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $path
	 *
	 * @return mixed
	 */
	public function getFlatFileTreeIndexedByPath($path);

	/**
	 * @author   Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $path
	 *
	 * @return SplFileInfo[]
	 */
	public function getFlatFileTree($path);
}