<?php

use Illuminate\Console\Command;
use Eddieh\ByteRub\ByteRub;


class FundingUpdate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'funding:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates the funding data.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('ByteRub Address: '.Config::get('byterub::address'));
		$this->info('Wallet Address: '.Config::get('byterub::wallet'));
		$this->info('Updating the funding data.');
		$funding = Funding::all();
		$this->info('Receiving funds.');
		$byterub = new ByteRub;
		$byterub->clientReceive();
		$this->info('Funds received.');
		$this->info('Updating cache.');
		foreach($funding as $thread)
		{
			$this->info('Clearing thread_'.$thread->thread_id);
			Cache::tags('thread_'.$thread->thread_id)->flush();
		}
		$this->info('Update complete!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}
