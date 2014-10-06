<?php namespace Mobydoc\Console;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

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
	protected $description = 'Random quote';
	
	
	/**
	 * @var DocumentationService
	 */
	private $docService;


	/**
	 * Create a new command instance.
	 *
	 * @param DocumentationService $docService
	 *
	 * @return \Mobydoc\Console\SynchronizeCommand
	 */
	public function __construct(DocumentationService $docService)
	{
		parent::__construct();
		$this->docService = $docService;
	}


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->comment(PHP_EOL . Inspiring::quote() . PHP_EOL);
		dd($this->docService->getDocumentTree());
	}
}
