<?php namespace Mobydoc\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Mobydoc\Documentation\DocumentSynchronizer;

class SynchronizeCommand extends Command
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'synchronize';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Synchronize';
	/**
	 * @var DocumentSynchronizer
	 */
	private $docSynchronizer;


	/**
	 * Create a new command instance.
	 *
	 * @param DocumentSynchronizer $docSynchronizer
	 *
	 * @return \Mobydoc\Console\SynchronizeCommand
	 */
	public function __construct(DocumentSynchronizer $docSynchronizer)
	{
		parent::__construct();
		$this->docSynchronizer = $docSynchronizer;
	}


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->docSynchronizer->synchronize();
	}
}
